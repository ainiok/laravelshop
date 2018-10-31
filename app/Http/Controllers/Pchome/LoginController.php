<?php

namespace App\Http\Controllers\Pchome;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class LoginController extends Controller
{
    //
    public function index()
    {
        echo Uuid::uuid4();
    }
}
