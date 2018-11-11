<?php
/**
 * Created by PhpStorm.
 * User: xiaojin
 * Email: job@ainiok.com
 * Date: 2018/11/11 12:07
 */

use Illuminate\Support\Facades\DB;

if (!function_exists('human_filesize')) {
    /**
     * 返回可读性更好的文件尺寸
     */
    function human_filesize($bytes, $decimals = 2)
    {
        $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
        $factor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }
}

if (!function_exists('lang')) {
    /**
     * Trans for getting the language.
     *
     * @param string $text
     * @param  array $parameters
     * @return string
     */
    function lang($text, $parameters = [])
    {
        return trans('blog.' . $text, $parameters);
    }
}

if (!function_exists('uuid')) {
    function uuid()
    {
//        $uuid = DB::select('SELECT uuid() FROM DUAL');
        $uid = \Ramsey\Uuid\Uuid::uuid4(); // 688c0986-fd47-4823-9b3d-b436854d8967
        return str_replace('-', '', $uid);
    }
}