<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\LoginException;
use Validator;
use App;

class AuthController extends Controller
{
    //
    use ThrottlesLogins;

    protected $redirectTo = 'admin';

    protected $guard = 'admin';

    protected $loginView = 'admin.login';

    protected $loginUserType;

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->clearLoginAttempts($request); //用来清理登陆错误过多
        if (!$request->has('code')) {
            // check login
            $this->validateLogin($request);
            $credentials = $this->getCredentials($request);
            // login
            if ($this->guard()->attempt($credentials)) {
                if ($this->guard()->check($credentials)) {
                    return $this->handleUserAuthenticated($request);
                } else {
                    //二次验证
                }
            }
            return $this->handleUserAuthenticateFailed($request);
        }
    }

    protected function handleUserAuthenticateFailed(Request $request)
    {
        // 判断账号是否被禁用
        if ($admin = $this->guard()->getLastAttempted()) {
            if ($admin->forbidden) {
                $msg = trans('login.user_forbidden', ['name' => $request->name]);
                throw new App\Exceptions\LoginException(parent::response_json(1, $msg));
            }
        }
        $this->incrementLoginAttempts($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request, 'admin', $this->limiter()->attempts($request));
            return $this->sendLockoutResponse($request);
        }
        return $this->sendFailedLoginResponse($request);
    }

    protected function handleUserAuthenticated(Request $request)
    {
        $request->session()->regenerate();
        // Clear the login locks for the given user credentials.
        $this->clearLoginAttempts($request);
        $admin = $this->guard()->user();
        \Log::info('管理员:' . $admin->name . '登陆成功!');
        //登陆成功这里要返回json
        return redirect()->intended($this->redirectTo);
    }

    protected function validateLogin(Request $request)
    {
        // 密码错误次数
        $attempts = $this->limiter()->attempts($this->throttleKey($request));
        // 账号是否被锁
        if ($locked = $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }
        if (filter_var($request->name, FILTER_VALIDATE_INT)) {
            $this->loginUserType = 'phone';
            $rule = 'required|exists:admins,phone|digits:11';
        } else {
            $this->loginUserType = 'email';
            $rule = 'required|safe_input|exists:admins,email|email|max:64';
        }
        $rules = [
            'name' => $rule,
            'password' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        $validator->sometimes('captcha', 'required|captcha', function () use ($request, $locked, $attempts) {
            if (App::environment('test')) {
                return false;
            }
            return ($attempts > config('logincfg.captcha_count') && !$locked);
        });
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    }

    protected function getCredentials(Request $request)
    {
        $params = $request->only('name', 'password');
        $params[$this->loginUserType] = $params['name'];
        return array_except($params, ['name']);
    }

    /**
     * Redirect the user after determining they are locked out.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );
        throw new LoginException(parent::response_json(1, '', ['lock_flag' => 1, 'seconds' => $seconds]));
    }

    /**
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $msg = trans('login.wrong_password');
        $attempts = $this->limiter()->attempts($this->throttleKey($request));
        $data = ['count' => $attempts, 'captcha_flag' => 0, 'lock_flag' => 0];
        if ($attempts > config('logincfg.captcha_count')) {
            $data['captcha_flag'] = 1;
        }
        throw new LoginException(parent::response_json(1, $msg, $data));
    }

    /**
     * Determine if the user matches the credentials.
     *
     * @param  mixed $user
     * @param  array $credentials
     * @return bool
     */
    protected function hasValidCredentials($user, $credentials)
    {
        return !is_null($user) && !$user->forbidden && $this->validateCredentials($user, $credentials);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Fire an event when a lockout occurs.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    protected function fireLockoutEvent(Request $request, $user_type, $attempts)
    {
        event(new App\Events\LockoutEvent($request, $user_type, $attempts));
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    protected function username()
    {
        return 'email';
    }

    /**
     * Get the maximum number of attempts to allow.
     *
     * @return int
     */
    protected function maxAttempts()
    {
        return property_exists($this, 'maxAttempts') ? $this->maxAttempts : config('logincfg.lock_count');
    }

    /**
     * Get the number of minutes to throttle for.
     *
     * @return int
     */
    protected function decayMinutes()
    {
        return property_exists($this, 'decayMinutes') ? $this->decayMinutes : config('logincfg.admin_lock_time');
    }
}
