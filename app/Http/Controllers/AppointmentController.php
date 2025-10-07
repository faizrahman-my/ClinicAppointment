<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\Rating;
use App\Models\Staff;
use App\Models\User;
use App\Services\GoogleService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    //

    protected $googleService;

    public function __construct(GoogleService $googleService)
    {
        $this->googleService = $googleService;
    }

    public function index()
    {
        $user = User::all();
        $userLookup = $user->keyBy('id');
        $userLookupUname = $user->keyBy('username');
        $appointment = Appointment::where('user_id', Auth::id())->get();
        $clinic = Clinic::all();
        $staff = Staff::all();
        $clinicLookup = $clinic->keyBy('id');
        $staffLookup = $staff->keyBy('id');

        foreach ($appointment as $apt) {
            $user_id = $staffLookup[$apt->staff_id]->user_id ?? null;
            $approve_stat = $apt->status ?? $apt->reservation_status;
            $my_apt[] = [
                'id' => base64_encode($apt->id),
                'reason' => $apt->reservation_reason,
                'clinic' => $clinicLookup[$apt->clinic_id]->branch,
                'staff' => $userLookup[$user_id]->name ?? 'Not Assigned',
                'date' => $apt->reservation_date,
                'status' => $apt->reservation_status == 'approved' ? $approve_stat : $apt->reservation_status,
            ];
        }
        $data['appointment_list'] = $my_apt ?? [];
        return view('pages.appointment.index', $data);
    }

    public function cancelReservation(Request $request, $id)
    {
        $appointment = Appointment::where('id', base64_decode($id))->first();
        $appointment->delete();
        return redirect('appointment');
    }

    public function reserve()
    {
        $data['time_list'] = array("Morning", "Afternoon", "Evening", "Night");
        $data['service_list'] = array("xray", "urine test", "blood donor", "medical checkup only");
        $data['clinic_list'] = Clinic::all();

        return view('pages.appointment.reserve', $data);
    }

    public function status($id)
    {
        $appointment = Appointment::where('id', base64_decode($id))->first();
        $clinic = Clinic::all();
        $user = User::all();
        $staff = Staff::all();
        $clinicLookup = $clinic->keyBy('id');
        $userLookup = $user->keyBy('id');
        $staffLookup = $staff->keyBy('id');


        $user_id = $staffLookup[$appointment->staff_id]->user_id ?? null;
        $my_apt = [
            'id' => base64_decode($id),
            'reason' => $appointment->reservation_reason,
            'clinic' => $clinicLookup[$appointment->clinic_id]->branch,
            'address' => $clinicLookup[$appointment->clinic_id]->address,
            'staff' => $userLookup[$user_id]->username ?? 'Not Assigned',
            'date' => $appointment->reservation_date,
            'status' => $appointment->reservation_status,
            'time' => $appointment->reservation_time,
            'comment' => $appointment->doctor_comment,
        ];

        $data['appointment'] = $my_apt ?? [];
        $data['id'] = $id;

        return view('pages.appointment.status', $data);
    }

    public function detail($id)
    {
        $appointment = Appointment::where('id', base64_decode($id))->first();
        $clinic = Clinic::all();
        $user = User::all();
        $staff = Staff::all();
        $clinicLookup = $clinic->keyBy('id');
        $userLookup = $user->keyBy('id');
        $staffLookup = $staff->keyBy('id');


        $user_id = $staffLookup[$appointment->staff_id]->user_id ?? null;
        $my_apt = [
            'id' => base64_decode($id),
            'reason' => $appointment->reservation_reason,
            'clinic' => $clinicLookup[$appointment->clinic_id]->branch,
            'staff' => $userLookup[$user_id]->name ?? 'Not Assigned',
            'room' => $appointment->room_no,
            'date' => $appointment->reservation_date,
            'time' => $appointment->appointment_time,
            'status' => $appointment->reservation_status == 'approved' ? $appointment->status : $appointment->reservation_status,
            'comment' => $appointment->doctor_comment,
        ];

        //get rating count row
        $data['rating'] = Rating::where('user_id', Auth::id())->where('appointment_id', base64_decode($id))->first();

        $data['appointment'] = $my_apt ?? [];
        $data['id'] = $id;

        return view('pages.appointment.detail', $data);
    }

    public function approval()
    {
        $appointment = Appointment::where('clinic_id', Auth::user()->staff->clinic_id)->get();
        $clinic = Clinic::all();
        $user = User::all();
        $staff = Staff::all();
        $clinicLookup = $clinic->keyBy('id');
        $userLookup = $user->keyBy('id');
        $staffLookup = $staff->keyBy('id');

        foreach ($appointment as $apt) {
            $user_id = $staffLookup[$apt->staff_id]->user_id ?? null;
            $my_apt[] = [
                'id' => base64_encode($apt->id),
                'patient' => $userLookup[$apt->user_id]->name,
                'reason' => $apt->reservation_reason,
                'clinic' => $clinicLookup[$apt->clinic_id]->branch,
                'staff' => $userLookup[$user_id]->name ?? 'Not Assigned',
                'date' => $apt->reservation_date,
                'time' => $apt->reservation_time,
                'hour' => $apt->appointment_time,
                'room' => $apt->room_no,
                'status' => $apt->reservation_status == 'approved' ? $apt->status : $apt->reservation_status,
                'comment' => $apt->doctor_comment,
                'desc' => $apt->doctor_desc
            ];
        }
        foreach ($staff as $staffs) {
            if ($staffs->clinic_id == Auth::user()->staff->clinic_id && $staffs->is_staff == 1 && $staffs->is_admin == 0) {
                $my_staff[] = [
                    'id' => $staffs->id,
                    'name' => $userLookup[$staffs->user_id]->name
                ];
            }
        }
        $data['staff_list'] = $my_staff ?? [];
        $data['appointment_list'] = $my_apt ?? [];

        return view('pages.appointment.admin', $data);
    }

    public function setApprove(Request $request, $id)
    {
        $appointment = Appointment::where('id', base64_decode($id))->first();
        $appointment->reservation_status = 'approved';
        $appointment->status = 'waiting list';
        $input = $request->validate([
            'doctor_assign' => 'required',
            'room_no' => 'required',
            'appointment_hour' => 'required',
        ]);
        $appointment->staff_id = $input['doctor_assign'];
        $appointment->room_no = $input['room_no'];
        $appointment->appointment_time = $input['appointment_hour'];
        $appointment->save();

        $user = User::where('id', $appointment->user_id)->first();
        $branchName = Clinic::where('id', $appointment->clinic_id)->first();
        $adminName = User::where('id', Auth::id())->first();

        $sheetValue = ['Appointment for ' . $user->name . ' on ' . Carbon::parse($appointment->reservation_date)->format('d/m/Y') . ' is approved ( ' . $appointment->reservation_reason . ' ) by ' . $adminName->name, (string)date('d/m/Y H:i:s')];
        $this->googleService->insertSheetValueSeparateTab(
            $branchName->branch,
            '!B4:C',
            $sheetValue,
            'History Template'
        );

        return redirect('/appointment/admin');
    }

    public function setReject(Request $request, $id)
    {
        $appointment = Appointment::where('id', base64_decode($id))->first();
        $appointment->reservation_status = 'rejected';
        $input = $request->validate([
            'feedback' => 'required'
        ]);
        $appointment->doctor_comment = $input['feedback'];
        $appointment->save();

        $user = User::where('id', $appointment->user_id)->first();
        $branchName = Clinic::where('id', $appointment->clinic_id)->first();
        $adminName = User::where('id', Auth::id())->first();

        $sheetValue = ['Appointment for ' . $user->name . ' on ' . Carbon::parse($appointment->reservation_date)->format('d/m/Y') . ' is rejected ( ' . $appointment->reservation_reason . ' ) by ' . $adminName->name, (string)date('d/m/Y H:i:s')];
        $this->googleService->insertSheetValueSeparateTab(
            $branchName->branch,
            '!B4:C',
            $sheetValue,
            'History Template'
        );

        return redirect('/appointment/admin');
    }

    public function manage()
    {
        $appointment = Appointment::where('clinic_id', Auth::user()->staff->clinic_id)->get();
        $clinic = Clinic::all();
        $user = User::all();
        $staff = Staff::all();
        $clinicLookup = $clinic->keyBy('id');
        $userLookup = $user->keyBy('id');
        $staffLookup = $staff->keyBy('id');
        $staffId = Auth::user()->staff;
        if ($staffId) {

            foreach ($appointment as $apt) {
                $user_id = $staffLookup[$apt->staff_id]->user_id ?? null;
                if ($apt->reservation_status == 'approved' && $apt->staff_id == $staffId->id) {
                    $my_apt[] = [
                        'id' => base64_encode($apt->id),
                        'patient' => $userLookup[$apt->user_id]->name,
                        'reason' => $apt->reservation_reason,
                        'clinic' => $clinicLookup[$apt->clinic_id]->branch,
                        'staff' => $userLookup[$user_id]->name ?? 'Not Assigned',
                        'date' => $apt->reservation_date,
                        'time' => $apt->reservation_time,
                        'hour' => $apt->appointment_time,
                        'room' => $apt->room_no,
                        'status' => $apt->reservation_status == 'approved' ? $apt->status : $apt->reservation_status,
                        'comment' => $apt->doctor_comment,
                        'desc' => $apt->doctor_desc
                    ];
                }
            }
        }


        $data['appointment_list'] = $my_apt ?? [];
        return view('pages.appointment.doctor', $data);
    }

    public function updateStatus(Request $request, $id)
    {
        $appointment = Appointment::where('id', base64_decode($id))->first();
        $input = $request->validate([
            'appointment_status' => 'required',
            'doctor_desc' => 'nullable',
            'doctor_comment' => 'nullable'
        ]);
        $appointment->status = $input['appointment_status'];
        if ($input['doctor_desc']) {
            $appointment->doctor_desc = $input['doctor_desc'];
        }
        if ($input['doctor_comment']) {
            $appointment->doctor_comment = $input['doctor_comment'];
        }

        $appointment->save();

        //update by doctor
        $user = User::where('id', $appointment->user_id)->first();
        $branchName = Clinic::where('id', $appointment->clinic_id)->first();
        $doctorName = User::where('id', Auth::id())->first();
        $sheetValue = ['Appointment for ' . $user->name . ' on ' . Carbon::parse($appointment->reservation_date)->format('d/m/Y') . ' is updated to ' . $appointment->status . ' by Dr. ' . $doctorName->name, (string)date('d/m/Y H:i:s')];
        $this->googleService->insertSheetValueSeparateTab(
            $branchName->branch,
            '!B4:C',
            $sheetValue,
            'History Template'
        );

        return redirect('appointment/doctor');
    }

    public function setReservation(Request $request)
    {
        $input = $request->validate([
            'username' => 'required',
            'appointment_date' => 'required|after_or_equal:today',
            'appointment_time' => 'required',
            'service_type' => 'required',
            'clinic_branch' => 'required'
        ]);
        $user = User::where('username', $input['username'])->first();
        $appointmentData = ['reservation_reason' => $input['service_type'], 'reservation_date' => $input['appointment_date'], 'reservation_time' => $input['appointment_time'], 'reservation_status' => 'pending', 'user_id' => $user->id, 'clinic_id' => $input['clinic_branch']];
        $appointment = Appointment::create($appointmentData);
        $branchName = Clinic::where('id', $input['clinic_branch'])->first();

        $sheetValue = ['Appointment for ' . $user->name . ' on ' . Carbon::parse($appointment->reservation_date)->format('d/m/Y') . ' is pending for approval ( ' . $appointment->reservation_reason . ' )', (string)date('d/m/Y H:i:s')];
        $this->googleService->insertSheetValueSeparateTab(
            $branchName->branch,
            '!B4:C',
            $sheetValue,
            'History Template'
        );


        return redirect('/appointment');
    }
}
