<?php
/**
 * Created by PhpStorm.
 * User: xiaojin
 * Email: job@ainiok.com
 * Date: 2018/11/11 12:07
 */

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class CommonHelper
{
    public function Uuid()
    {
        $uid = DB::select('SELECT uuid() FROM DUAL');
        return str_replace('-', '', $uid);
    }

    public function test()
    {
        return "TTT";
    }
}