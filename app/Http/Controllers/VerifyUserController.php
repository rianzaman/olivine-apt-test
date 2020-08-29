<?php

namespace App\Http\Controllers;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerifyUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(User $user, $token)
    {
        if($user->verification_token != null && $user->verification_token === $token){
            $user->verification_token = null;
            $user->email_verified_at = Carbon::now();
            $user->status = 'active';
            $user->save();
            Toastr::success('Thank you for verifying your email address. Please login to use the application', 'Account verified');
            return redirect()->route('to-dos.index');
        }else{
            Toastr::warning('Sorry, the verification token does not exist in our system. Please try again.', 'Verification error.');
            return redirect()->route('to-dos.index');
        }
    }
}
