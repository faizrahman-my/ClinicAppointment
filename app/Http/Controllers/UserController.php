<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('pages.user.login');
    }

    public function register()
    {
        return view('pages.user.register');
    }

    public function profile()
    {
        return view('pages.user.profile');
    }

    public function logout()
    {
        session()->flush();
        return redirect('');
    }

    public function redirectLoginUser(Request $request)
    {
        $input = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $input['username'])->first();

        $plain_pwd = $input['password'];
        if ($user) {
            $hashed_pwd = $user->password;
            if (Hash::check($plain_pwd, $hashed_pwd)) {
                $staff = Staff::where('user_id', $user->id)->first();
                session()->put([
                    'name' => $user->name ?? 'user-' . $user->username,
                    'username' => $user->username,
                    'email' => $user->email,
                    'sa' => $user->is_superadmin
                ]);
                if($staff){
                    session()->put([
                        'a' => $staff->is_admin,
                        'staff' => $staff->is_staff,
                        'clinic' => $staff->clinic_id
                    ]);
                }
                

                return redirect('/appointment');
                // return json_encode(session('sa'));
            } else {
                return redirect('/login')->with('error', 'Your username or password is incorrect');
            }
        }
        else{
            return redirect('/login')->with('error', 'Your username or password is incorrect');
        }
    }

    public function createNewAccount(Request $request)
    {

        $input = $request->validate([
            'username' => 'required|min:4|max:20|unique:users,username|alpha_dash',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);
        $userDataArray = ['name' => $request->input('name'), 'username' => $input['username'], 'password' => $input['password'], 'email' => $input['email'], 'is_superadmin' => 0];
        $newUser = User::create($userDataArray);

        session()->put([
            'name' => $newUser->name ?? 'user-' . $newUser->username,
            'username' => $newUser->username,
            'email' => $newUser->email,
            'sa' => $newUser->is_superadmin
        ]);

        return redirect('/appointment');
    }

    public function updateProfile(Request $request)
    {

        $input = $request->validate([
            'name' => 'nullable',
            'username' => 'nullable|min:4|max:20|unique:users,username|alpha_dash',
            'email' => 'nullable|email|unique:users,email',
        ]);
        $user = User::where('username', session('username'))->first();
        if($input['name']){
            $user->name = $input['name'];
            $request->session()->put('name', $input['name']);
        }
        if($input['username']){
            $user->username = $input['username'];
            $request->session()->put('username', $input['username']);
        }
        if($input['email']){
            $user->email = $input['email'];
            $request->session()->put('email', $input['email']);
        }

        $user->save();

        return redirect('profile');
    }
    
    public function changePassword(Request $request) {
        $input = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        $user = User::where('username', session('username'))->first();

        if(Hash::check($input['old_password'], $user->password)) {
            $user->password = Hash::make($input['new_password']);
            $user->save();

            return redirect('profile')->with('success', 'You have successfully changed your password');
        }
        else{
            return redirect('profile')->with('error', 'You old password is incorrect');
        }
    }
}
