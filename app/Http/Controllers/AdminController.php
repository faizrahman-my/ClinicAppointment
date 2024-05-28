<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index()
    {
        if (session('sa') == 1) {
            $staff = Staff::all();
            $staffLookup = $staff->keyBy('user_id');
            $user = User::all();
            $userLookup = $user->keyBy('id');
            $clinic = Clinic::all();
            $clinicLookup = $clinic->keyBy('id');

            foreach ($user as $u) {
                // Check if user exists in staff lookup
                if (isset($staffLookup[$u->id])) {
                    $branch = $clinicLookup[$staffLookup[$u->id]->clinic_id]->branch;
                    $role = $staffLookup[$u->id]->is_admin ? 'Admin' : 'Doctor';
                    $staff_id = $staffLookup[$u->id]->id;
                    $is_staff = $staffLookup[$u->id]->is_staff;
                } else if ($u->is_superadmin == 1) {
                    $branch = '-';
                    $role = 'Superadmin';
                    $staff_id = '-';
                    $is_staff = '-';
                } else {
                    // If user doesn't have staff record, set branch and role to empty strings
                    $branch = '-';
                    $role = 'User';
                    $staff_id = '-';
                    $is_staff = '-';
                }
                if ($u->is_superadmin == 0) {
                    $my_user[] = [
                        'id' => $u->id,
                        'name' => $u->name,
                        'username' => $u->username,
                        'email' => $u->email,
                        'branch' => $branch,
                        'role' => $role,
                        'staff_id' => $staff_id,
                        'staff_status' => $is_staff
                    ];
                }
            }
        }

        $data['clinic_list'] = Clinic::all() ?? [];
        $data['user_list'] = $my_user ?? [];

        return view('pages.user.user_list', $data);
    }


    public function manageUser(Request $request, $id)
    {
        if ($request->query('menu') == 'reset') {
            $user_reset = User::where('id', $id)->first();
            $user_reset->password = Hash::make('abcd1234');
            $user_reset->save();

            return redirect('users');
        } else if ($request->query('menu') == 'disable') {
            $staff_disable = Staff::where('id', $id)->first();
            $staff_disable->is_staff = 0;
            $staff_disable->save();

            return redirect('users');
        } else if ($request->query('menu') == 'enable') {
            $staff_enable = Staff::where('id', $id)->first();
            $staff_enable->is_staff = 1;
            $staff_enable->save();

            return redirect('users');
        } else if ($request->query('menu') == 'remove') {
            $staff_remove = User::where('id', $id)->first();
            $staff_remove->delete();

            return redirect('users');
        } else {
            return 'helo world';
        }
        // return view('pages.user.manage_user', ['id' => $id]);
    }

    public function createStaffAccount(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'username' => 'required|min:4|max:20|unique:users,username|alpha_dash',
            'email' => 'required|email|unique:users,email',
            'branch' => 'required',
            'role' => 'required'
        ]);
        $userData = ['name' => $input['name'], 'username' => $input['username'], 'password' => 'abcd1234', 'email' => $input['email'], 'is_superadmin' => 0];
        $newUser = User::create($userData);

        $staffData = ['user_id' => $newUser->id, 'clinic_id' => $input['branch'], 'is_admin' => $input['role'], 'is_staff' => 1];
        $newStaff = Staff::create($staffData);

        return redirect('users');

        // return dd($request->all());
    }

    public function createClinicBranch(Request $request)
    {
        $input = $request->validate([
            'branch' => 'required|unique:clinics,branch',
            'address' => 'nullable'
        ]);
        $clinicData = ['branch' => $input['branch'], 'address' => $input['address']];
        $newClinic = Clinic::create($clinicData);

        return redirect('users');
    }
}
