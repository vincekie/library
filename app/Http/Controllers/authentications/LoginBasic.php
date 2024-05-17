<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddUser;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Exception;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function loginUser(Request $request)
    {
        try {
            $this->checkTooManyFailedAttempts($request);

            $credentials = $request->validate([
                'email' => 'required',
                'password'=> 'required',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return response()->json([
                    'success' => true,
                    'redirect' => route('dashboard-analytics')
                ]);
            }

            $this->handleFailedLogin($request->email);

        } catch (Exception $error) {
            $attemptsLeft = RateLimiter::remaining($this->throttleKey($request->email), 10);
            $seconds = RateLimiter::availableIn($this->throttleKey($request->email));

            return response()->json([
                'success'=> false,
                'message' => $error->getMessage(),
                'attemptsLeft' => $attemptsLeft,
                'timeLeft' => $seconds
            ]);
        }
    }

    protected function checkTooManyFailedAttempts(Request $request)
    {
        $key = $this->throttleKey($request->email);
        if (!RateLimiter::tooManyAttempts($key, 10)) {
            return;
        }

        $seconds = RateLimiter::availableIn($key);
        throw new Exception('Too many login attempts. Try again in ' . gmdate("H:i:s", $seconds));
    }

    protected function handleFailedLogin($email)
    {
        $key = $this->throttleKey($email);
        RateLimiter::hit($key, $seconds = 1800);
        throw new Exception('Invalid Credentials');
    }

    protected function throttleKey($email)
    {
        return Str::lower($email) . '|' . request()->ip();
    }

    public function logoutUser(Request $request){

      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect()->route('auth-login-basic');
  }

  public function verifyGoogle(Request $request)
  {
    $user = User::where('email', $request->email)->first();
    if ($user) {
      Auth::login($user);
      return response()->json(['status_code' => 0]);
    } else {
      return response()->json(['status_code' => 1]);
    }
  }
}
