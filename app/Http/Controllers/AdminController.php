<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index() {
        $data['clinic_list'] = Clinic::all();

        return view('pages.user.user_list', $data);
    }

    public function manageUser($id) {
        return view('pages.user.manage_user', ['id'=> $id]);
    }

    public function createStaffAccount(Request $request) {
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
}
