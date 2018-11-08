<?php
/**
 * Created by PhpStorm.
 * User: xiaojin
 * Email: job@ainiok.com
 * Date: 2018/11/9 0:09
 */

return [
    'captcha_count' => env('LOGIN_CAPTCHA_COUNT', 3),     //弹出验证码密码错误次数
    'lock_count' => env('LOGIN_LOCK_COUNT', 5),      //密码错误的最大次数
    'lock_time' => env('LOGIN_LOCK_TIME', 900),//密码错误次数超过阈值锁定时间/s
    'admin_lock_time' => env('ADMIN_LOGIN_LOCK_TIME', 3600),//管理员登录密码错误次数超过阈值锁定时间/s
    'home_url' => env('HOME_URL', 'https://www.ainiok.com'),
//    'admin_login_allow_ips' => env('ADMIN_LOGIN_ALLOW_IPLIST', ['0.0.0.0-255.255.255.255']), //超级管理员允许登录的IP范围
//    'admin_login_allow_host' => env('ADMIN_LOGIN_ALLOW_HOST', ''),//超级管理员允许登录的域名
//    'channel_login_allow_host' => env('CHANNEL_LOGIN_ALLOW_HOST', ''),//租户管理员允许登录的域名
];