<?php

namespace App\Http\Controllers\Reg;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\OTPMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CustomResetPassword extends Controller
{
    public function forgotpassword()
    {
        return view('auth.passwords.forgotPassword');
    }
    public function RequestOTP(Request $request)
    {
        if($request -> ajax())
        {
            $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

            Session::put('emailID', $request->input('email'));
        $Exists = User::where('email','=',$request->input('email'))->exists();

        if (!$Exists) {
                return response()->json(['IsSuccess'=>'1']);
        }
        else
            {
                $user = User::where('email','=',$request->input('email'))->first();

                $OTP = rand(000000,999999);

                $user=['name' => $user->name,
                                    'OTP' => $OTP,
                                    'email' => $request->input('email')];
                            $user['to'] = $request->input('email');
                            Mail::to($user['to'])->send(new OTPMail($user));
                            // $Mail = Mail::send('Email.otpMail',$user,function($messages) use ($user){
                            //     $messages->to($user['to'])
                            //             ->subject('OTP to change password in Alumini Management System');
                            // });

                DB::table('users')
                        ->where('email',$request->input('email'))
                        ->update(array(
                            'OTP' => $OTP,
                            'updated_at' => $Date
                        ));

                return response()->json(['IsSuccess'=>'2']);
            }

        }
    }

    public function VerifyOTP(Request $request)
    {
        if($request -> ajax())
        {
            $emailID = Session::get('emailID');
            $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');

            $Exists = User::where('email','=',$emailID)->exists();
            if (!$Exists) {
                return response()->json(['IsSuccess'=>'3']);
            }
            else{
                $VerifyOTP = User::where('email','=',$emailID)->first();
                if (($VerifyOTP -> OTP) == $request->input('OTP') && (($VerifyOTP -> email) == $emailID)) {
                    return response()->json(['IsSuccess'=>'4']);
                }
                else
                {
                    return response()->json(['IsSuccess'=>'5']);
                }
            }
        }
    }

    public function EnterNewPassword(Request $request)
    {

        $Date = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');
        $emailID = Session::get('emailID');

        if($request -> ajax())
        {

            if(($request -> input ('password')) == ($request -> input('RePassword')))
            {
                DB::table('users')
                    ->where('email',$emailID)
                    ->update(array(
                    'password' => Hash::make($request -> input ('password')),
                    'OTP' => NULL,
                    'updated_at' => $Date
                    ));
                    return response()->json(['IsSuccess'=>'6']);
            }
            else
            {
                return response()->json(['IsSuccess'=>'7']);
            }
        }

    }
}
