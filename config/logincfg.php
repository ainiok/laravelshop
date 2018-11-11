<?php
/**
 * Created by PhpStorm.
 * User: xiaojin
 * Email: job@ainiok.com
 * Date: 2018/11/9 0:09
 */

return [
    'captcha_count' => env('LOGIN_CAPTCHA_COUNT', 3),     //密码错误3次时需要验证码
    'lock_count' => env('LOGIN_LOCK_COUNT', 5),      //密码错误5次将被锁
    'lock_time' => env('LOGIN_LOCK_TIME', 5),//密码错误次数超过阈值锁定时间/min
    'admin_lock_time' => env('ADMIN_LOGIN_LOCK_TIME', 60),//管理员登录密码错误次数超过阈值锁定时间/min
    'home_url' => env('HOME_URL', 'https://www.ainiok.com'),
//    'admin_login_allow_ips' => env('ADMIN_LOGIN_ALLOW_IPLIST', ['0.0.0.0-255.255.255.255']), //超级管理员允许登录的IP范围
//    'admin_login_allow_host' => env('ADMIN_LOGIN_ALLOW_HOST', ''),//超级管理员允许登录的域名
//    'channel_login_allow_host' => env('CHANNEL_LOGIN_ALLOW_HOST', ''),//租户管理员允许登录的域名
];