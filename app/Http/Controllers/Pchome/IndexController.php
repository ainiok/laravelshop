<?php

namespace App\Http\Controllers\Pchome;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(Request $request)
    {
        dd(uuid());
    }
}
