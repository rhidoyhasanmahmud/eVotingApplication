<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPassword;
use App\Mail\VerificationEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SignupController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|required_with:repeat_password|same:repeat_password',
            'repeat_password' => 'required',
            'constituency' => 'required',
            'province' => 'required',
            'sub_county' => 'required',
            'country_id' => 'required',
            'role_id' => 'required',
        ]);

        // if validator fails
        if ($validator->fails()) {
            $notification = array('message' => 'Something Wents Wrong. Please Check Again', 'alert-type' => 'success');
            return redirect()->back()->WithErrors($validator)->withInput()->with($notification);
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $constituency = $request->input('constituency');
        $province = $request->input('province');
        $sub_county = $request->input('sub_county');
        $country_id = $request->input('country_id');
        $group_id = $request->input('role_id');
        //$verify_token = md5(rand(1, 10) . microtime());

        User::insert([
            'name' => $name,
            'active' => 1,
            'email' => $email,
            'constituency' => $constituency,
            'province' => $province,
            'sub_county' => $sub_county,
            'password' => Hash::make($password),
            //'email_verification_token' => $verify_token,
            'group_id' => $group_id,
            'country_id' => $country_id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        session()->flash('message', 'Registration Completed. Please Login');
        session()->flash('alert_tag', 'alert-success');
        return view('custom_auth.login_form');

    }

    protected function account_verification($token)
    {
        $data = User::where([['email_verification_token', $token], ['status', 0]])->first();
        if ($data) {
            $to = Carbon::parse($data->created_at);
            $from = Carbon::parse(date('Y-m-d H:i:s'));
            $duration = $from->diffInHours($to);
            $duration = (gmdate('H', $duration));
            if ($duration <= 2) {
                User::where('email_verification_token', $token)->update(['status' => 1]);
                session()->flash('message', 'Your Account Activated. Please Login');
                session()->flash('alert_tag', 'alert-success');
                return view('custom_auth.login_form');
            }
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
            return redirect('signup_page');
        }
    }

    protected function forgetpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        // if validator fails
        if ($validator->fails()) {
            $notification = array('message' => 'Something Wents Wrong. Please Check Again', 'alert-type' => 'success');
            return redirect()->back()->WithErrors($validator)->withInput()->with($notification);
        }

        $email = $request->input('email');
        $verify_token = md5(rand(1, 10) . microtime());
        $isExistEmail = User::where('email', $request->email)->update(['email_verification_token' => $verify_token]);
        if ($isExistEmail) {
            $user = User::where('email', $request->email)->first();
            $user = ['full_name'=>$user->full_name, 'email_verification_token'=>$user->email_verification_token];

            Mail::send(['text'=>'mailusers.forget_password'],$user ,function($message) use ($request) {
                $message->to($request->email)->subject('Account Verification');
                $message->from(config('mail.from.address'),'E-Tax');
            });

            $notification = array('message' => 'Please check email for Password Reset.', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            session()->flash('message', 'Email Not Found.');
            session()->flash('alert_tag', 'alert-danger');
            return redirect('forget-password');
        }
    }

    protected function passwordupdateverify($token)
    {

        $data = User::where([['email_verification_token', $token]])->first();
        if ($data) {
            $to = Carbon::parse($data->created_at);
            $from = Carbon::parse(date('Y-m-d H:i:s'));
            $duration = $from->diffInHours($to);
            $duration = (gmdate('H', $duration));
            if ($duration <= 2) {
                User::where('email_verification_token', $token)->update(['status' => 1]);
                session()->flash('message', 'Please Reset your password');
                session()->flash('alert_tag', 'alert-success');
                return view('mailusers.reset_password')->with(array('token'=>$token));
            }
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
            return redirect('login');
        }
    }

    protected function passwordupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|required_with:retype_new_password|same:retype_new_password',
            'retype_new_password' => 'required',
            'token' => 'required'
        ]);

        // if validator fails
        if ($validator->fails()) {
            $notification = array('message' => 'Something Wents Wrong. Please Check Again', 'alert-type' => 'success');
            return redirect('login');
        }

        $password = $request->input('new_password');
        $token = $request->input('token');

        $data = User::where([['email_verification_token', $token]]);

        if ($data) {
            User::where('email_verification_token', $token)->update(['password' => Hash::make($password), 'email_verification_token'=> '']);
            session()->flash('message', 'Password Updated Successfully');
            session()->flash('alert_tag', 'alert-success');
            return redirect('login');
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
            return redirect('login');
        }
    }
}
