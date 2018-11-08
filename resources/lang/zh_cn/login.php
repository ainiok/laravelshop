<?php
/**
 * Created by PhpStorm.
 * User: xiaojin
 * Date Time: 2018/9/4 16:57
 * Email:  job@ainiok.com
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'find_password'     => ':name 已存在',
    'login_success'     => ':name 登录成功',
    'user_noexit'       => ':name 用户不存在',
    'wrong_password'   => '用户名或密码错误',
    'wrong_captcha'   => '验证码错误',
    'lock_input'       => '输入错误次数过多，请等待 :locktime 秒后重试',
    'user_forbidden'     => ':name 用户被禁止登录',
    'valid_name'     => ':name 用户名不合法，重新输入',
    'unknown'    =>  '未知错误',
    'user_not_exist' => ':value 对应的用户不存在',
    'ucenter_edit_error' => '【错误码:code】Ucenter修改用户密码失败',
    'password_reset' => [
        'expired' => '密码重置会话超时，请返回【忘记密码】重试',
        'subject' => '账户密码重置邮件',
        'mail_title' => '请点击以下链接，完成您账户的密码重置。(该链接仅在24小时内访问有效，24小时后请重新进行该账户的重置操作流程。)',
        'mail_footer' => '如果以上链接无法访问，请将该网址复制并粘贴至浏览器窗口中直接访问。'
    ],
    'abnormal_message' => '尊敬的用户，您的账户 :name 在 :time 有异常尝试登录行为，如非本人操作，建议立即修改密码。',
    'invalid_host'     => '超级管理员登录域名 :host 非法，登录IP :client_ip',
    'invalid_ip'     => '超级管理员登录IP :client_ip 不在设置范围内',
    'admin_invalid_ip'     => '超级管理员登录IP :client_ip 不在设置范围内',
    'user_invalid_ip'     => ':name 用户IP :client_ip 不在设置IP范围内',
    'must_login_before' => '请先使用用户名和密码登录',
    'need_second_auth' => '当前用户需要进行二次认证',

];
