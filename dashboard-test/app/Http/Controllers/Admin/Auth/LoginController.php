<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |----------------------------------------------------------------------
    | Login Controller
    |----------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to the admin dashboard. We have removed the reliance
    | on the "AuthenticatesUsers" trait and added custom login functionality.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the admin login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $pageTitle = "Admin Login";
        return view('admin.auth.login', compact('pageTitle'));
    }

    /**
     * Attempt to authenticate the user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Verify Captcha (if needed)
        if (!$this->verifyCaptcha()) {
            $notify[] = ['error', 'Invalid captcha provided'];
            return back()->withNotify($notify);
        }

        // Check if the login attempts are throttled
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        // Attempt to login with the given credentials
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If login fails, increment the number of attempts and return a failed response
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the login credentials.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Attempt to login the user with the provided credentials.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return Auth::guard('admin')->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * Get the credentials from the login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only('username', 'password');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard('admin')->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/admin');
    }

    /**
     * Get the username to be used for login.
     *
     * @return string
     */
    public function username()
    {
        return 'username'; // Adjust this based on your requirements.
    }

    /**
     * Handle the failed login attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return back()->withErrors([
            'username' => trans('auth.failed'),
        ]);
    }

    /**
     * Handle a successful login attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return redirect()->intended($this->redirectTo);
    }

    /**
     * Lockout the user after too many login attempts.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function fireLockoutEvent(Request $request)
    {
        // Custom lockout logic, if needed
    }

    /**
     * Check if there are too many login attempts.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function hasTooManyLoginAttempts(Request $request)
    {
        // Throttling login attempts logic, customize as needed
        return false;
    }

    /**
     * Clear the login attempts for the user.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function clearLoginAttempts(Request $request)
    {
        // Reset login attempts counter after successful login
    }

    /**
     * Verify the captcha if necessary.
     *
     * @return bool
     */
    protected function verifyCaptcha()
    {
        // Implement your captcha verification logic here
        return true; // Example
    }
}
