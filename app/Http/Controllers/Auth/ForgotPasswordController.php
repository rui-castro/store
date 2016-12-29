<?php

namespace Store\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Store\Http\Controllers\Controller;
use Store\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Constant representing the user not found response.
     *
     * @var string
     */
    const INVALID_USER = 'passwords.user';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Send a reset link to the given user, if the user is admin.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmailToAdmin(Request $request)
    {
        $user = User::whereEmail($request->only('email'))->first();
        if (is_null($user) || !$user->admin) {
            return back()->withErrors(
                ['email' => 'Guest user can\'t change the password.']
            );
        } else {
            return $this->sendResetLinkEmail($request);
        }
    }
}
