<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function response_json($code = 0, $msg = [], $data = [], $count = null)
    {
        if ($code === 0) {
            $res = [
                'code' => $code,
                'msg' => $msg,
                'data' => $data,
                'count' => $count
            ];
        } else {
            $res = [
                'code' => $code,
                'msg' => $msg,
                'data' => $data,
                'count' => $count
            ];
        }
        if (Request::has('callback')) {
            return response()->jsonp(Request::get('callback'), $res);
        }
        return response()->json($res);


    }
}
