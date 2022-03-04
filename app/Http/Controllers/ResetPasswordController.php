<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    public function sendmail(Request $a){
        $data = DB::table('users')->where('email' , $a->email)->first();
        if($data){
            $token = rand(1111,9999);

            DB::table('password_resets')->insert(['email'=>$a->email , 'token'=>$token , 'created_at'=>Carbon::now()]);
            $mail=Mail::send('email', ['token' => $token], function($message) use($a){
                $message->to($a->email);
                $message->subject('Reset Password Notification');
                });
            return response()->json([
                'status'=>200,
                'msg'=>'Mail Send On your Mail'
            ]);
        }
        else{
            return response()->json([
                'status'=>true,
                'msg'=>'Email Id not Found'
            ]);
        }
    }

    public function password_update(Request $a){
        $email_check = DB::table('users')->where('email' , $a->email)->first();

        if($email_check){
            $check = DB::table('password_resets')->where('token' , $a->token)->first();
            if($check){
                $users = DB::table('users')->where('email' , $a->email)->update(['password'=>Hash::make($a->password)]);
                DB::table('password_resets')->where('email' , $a->email)->delete();
                return response()->json([
                    'status'=>200,
                    'msg'=>'Password Reset Success'
                ]);
            }
            else{
                return response()->json([
                    'status'=>200,
                    'msg'=>'Invalid Token',
                ]);
            }

        }
        else{
            return response()->json([
                'status'=>200,
                'msg'=>'Invalid Email',
            ]);

        }
    }
}
