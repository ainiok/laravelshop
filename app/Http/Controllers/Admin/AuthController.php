<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    use ThrottlesLogins;

    protected $redirectTo = 'admin';

    protected $guard = 'admin';

    protected $loginView = 'admin.login';

    protected $loginUserType;

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        echo "sss";
    }
}
