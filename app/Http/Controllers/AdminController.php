<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index() {
        return view('pages.user.user_list');
    }

    public function manageUser($id) {
        return view('pages.user.manage_user', ['id'=> $id]);
    }
}
