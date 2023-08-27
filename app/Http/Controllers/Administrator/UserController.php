<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index () {
        return view('administrator.user.index');
    }

    public function edit () {
        return view('administrator.user.edit');
    }
}
