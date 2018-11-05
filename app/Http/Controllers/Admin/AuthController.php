<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    use ThrottlesLogins;

    protected $loginUserType;
}
