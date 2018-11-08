<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

/**
 * Autoloaded Service Providers  in path #config/app.php
 * Class CustomValidatorServiceProvider
 * @package App\Providers
 */
class CustomValidatorServiceProvider extends ServiceProvider
{
    const SAFE_CHARTERS_REG = '/[\\\">()=?#|\'&;%<\/!\+`\$\*]/';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 匹配URL
        Validator::extend('link', function ($attribute, $value, $parameters, $validator) {
            return filter_var($value, FILTER_VALIDATE_URL);
        });
        Validator::replacer('link', function ($message, $attribute, $rule, $parameters) {
            return str_replace([':attribute'], $attribute, $message);
        });
        // 安全邮箱验证
        Validator::extend('safe_input', function ($attribute, $value, $parameters, $validator) {
            return !preg_match(self::SAFE_CHARTERS_REG, $value);
        });
        Validator::replacer('safe_input', function ($message, $attribute, $rule, $parameters) {
            return str_replace([':attribute'], $attribute, $message);
        });
        //图片后缀名合法性
        Validator::extend('image_extension', function ($attribute, $value, $parameters) {
            return in_array(strtolower($value->getClientOriginalExtension()), $parameters);
        });
        Validator::replacer('image_extension', function ($message, $attribute, $rule, $parameters) {
            return str_replace([':attribute', ':extensions'], [$attribute, join(',', $parameters)], $message);
        });
        //电话号码校验
        Validator::extend('telephone', function ($attribute, $value, $parameters) {
            return preg_match('/^((1[36789][0-9]|15[012356789]|14[57]|100)[0-9]{8})$|^(\d{7,8}|\d{3,4}-\d{7,8}|\d{3,4}-\d{7,8}-\d{1,4}|\d{7,8}-\d{1,4})$/', $value);
        });
        //必须包含大小写字母，数字和特殊字符
        Validator::extend('strength_pwd', function ($attribute, $value, $parameters) {
            return preg_match('/\pL/', $value) && preg_match('/\pN/', $value)
                && preg_match('/(\p{Ll}+.*\p{Lu})|(\p{Lu}+.*\p{Ll})/u', $value)
                && preg_match("/[_'.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\-|\|/", $value);
        });
        Validator::replacer('strength_pwd', function ($message, $attribute, $rule, $parameters) {
            return str_replace([':attribute'], $attribute, $message);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
