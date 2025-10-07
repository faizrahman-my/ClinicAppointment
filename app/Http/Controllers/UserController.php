<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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
        $user = Auth::user();
        $staff = $user->staff;
        $clinic = $staff ? Clinic::find($staff->clinic_id) : null;
        $data['clinic_name'] = $clinic->branch ?? '';
        
        return view('pages.user.profile', $data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function redirectLoginUser(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/profile');
        }

        return redirect('/login')->with('error', 'Your username or password is incorrect');
    }

    public function createNewAccount(Request $request)
    {
        $input = $request->validate([
            'username' => 'required|min:4|max:20|unique:users,username|alpha_dash',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);
        
        $userDataArray = [
            'name' => $request->input('name'), 
            'username' => $input['username'], 
            'password' => $input['password'], 
            'email' => $input['email'], 
            'is_superadmin' => 0
        ];
        $newUser = User::create($userDataArray);

        Auth::login($newUser);
        return redirect('/appointment');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $input = $request->validate([
            'name' => 'nullable',
            'username' => 'nullable|min:4|max:20|unique:users,username,' . $user->id . '|alpha_dash',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
        ]);
        
        if($input['name']) $user->name = $input['name'];
        if($input['username']) $user->username = $input['username'];
        if($input['email']) $user->email = $input['email'];

        $user->save();
        return redirect('profile');
    }
    
    public function changePassword(Request $request) {
        $input = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        $user = Auth::user();

        if(Hash::check($input['old_password'], $user->password)) {
            $user->password = $input['new_password'];
            $user->save();

            return redirect('profile')->with('success', 'You have successfully changed your password');
        }
        else{
            return redirect('profile')->with('error', 'Your old password is incorrect');
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        
        $user = User::where('email', $googleUser->email)->first();
        
        if ($user) {
            Auth::login($user);
        } else {
            return redirect('/register')->with('error', 'No account found with this Google email. Please register first.');
        }
        
        return redirect('/profile');
    }
}
