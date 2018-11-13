<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>XxShop 管理平台</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="{{asset('/static/admin/layuiadmin/layui/css/layui.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('/static/admin/layuiadmin/style/admin.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('/static/admin/layuiadmin/style/login.css')}}" media="all">
    <style>
        .layadmin-user-login {
            background: url({{asset('/static/admin/images/bg.jpg')}});
        }
    </style>
</head>
<body>

<div class="layadmin-user-login layadmin-user-display-show">
    <div id="bg-image"></div>
    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2>管理员登陆</h2>
            <p>layui 官方出品的单页面后台管理模板系统</p>
        </div>
        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
            {{csrf_field()}}
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-username"
                       for="LAY-user-login-username"></label>
                {{--<input type="text" name="email" value="{{old('email')}}" lay-verify="required" placeholder="用户邮箱"--}}
                {{--class="layui-input">--}}
                <input type="text" name="name" value="admin@ainiok.com" lay-verify="required" placeholder="用户邮箱"
                       class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password"
                       for="LAY-user-login-password"></label>
                <input type="password" name="password" value="123456" lay-verify="required" placeholder="密码"
                       class="layui-input">
            </div>
            {{--<div class="layui-form-item">--}}
            {{--<div class="layui-row">--}}
            {{--<div class="layui-col-xs7">--}}
            {{--<label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>--}}
            {{--<input type="text" name="vercode" id="LAY-user-login-vercode" lay-verify="required" placeholder="验证码" class="layui-input">--}}
            {{--</div>--}}
            {{--<div class="layui-col-xs5">--}}
            {{--<div style="margin-left: 10px;">--}}
            {{--<img src="https://www.oschina.net/action/user/captcha" class="layadmin-user-login-codeimg" id="LAY-user-get-vercode">--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="layui-form-item" style="margin-bottom: 20px;">
                <input type="checkbox" name="remember" lay-skin="primary" title="记住密码">
                <a href="#" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="admin-login">登 入</button>
            </div>
        </div>
    </div>

    <div class="layui-trans layadmin-user-login-footer">

        <p>© 2018 <a href="http://www.layui.com/" target="_blank">layui.com</a></p>
        <p>
            <span><a href="http://www.layui.com/admin/#get" target="_blank">获取授权</a></span>
            <span><a href="http://www.layui.com/admin/pro/" target="_blank">在线演示</a></span>
            <span><a href="http://www.layui.com/admin/" target="_blank">前往官网</a></span>
        </p>
    </div>
</div>

<script src="{{asset('/static/admin/layuiadmin/layui/layui.js')}}"></script>
<script>
    layui.config({
        base: '/static/admin/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index'
    }).use(['index', 'form'], function () {
        var $ = layui.$
            , setter = layui.setter
            , admin = layui.admin
            , form = layui.form;

        form.on('submit(admin-login)', function (obj) {
            admin.req({
                url: '{{route('admin.login')}}'
                , method: 'POST'
                , data: obj.field
                , done: function (res) {
                    //
                    if (res.code === 0) {
                        window.location.href = res.data.location;
                    }
                }
            });
        })
    })
</script>
</body>
</html>