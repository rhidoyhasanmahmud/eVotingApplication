<?php

namespace App\Http\Controllers;

use App\FilesSubmission;
use Illuminate\Http\Request;

use App\Models\Group;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\CoreMechanism\Acl;

use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(Acl $acl)
    {
        $acl->has_permissions('view_users');

        $logged_user = auth()->user();

        $where = [
            ['id', '<>', $logged_user->id],
            ['group_id', 3]
        ];

        $data['users'] = User::with('group')->where($where)->get();

        return view('users.index', $data);
    }

    public function polling_station_index(Acl $acl){
         $acl->has_permissions('view_users');

        $logged_user = auth()->user();

        $where = [
            ['id', '<>', $logged_user->id],
            ['group_id', 2]
        ];

        $data['users'] = User::with('group')->where($where)->get();

        return view('users.polling_station_users', $data);
    }

    public function create(Acl $acl)
    {
        $acl->has_permissions('add_users');
        
        $data['groups'] = Group::select('id', 'name')->where('display', 1)->get();
        $data['country'] = Country::select('id', 'name')->where('display', 1)->get();
        return view('users.create', $data);
    }

    public function store(Acl $acl, Request $request)
    {

        $acl->has_permissions('add_users');

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
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        $logged_user = auth()->user();
        
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $constituency = $request->input('constituency');
        $province = $request->input('province');
        $sub_county = $request->input('sub_county');
        $country_id = $request->input('country_id');
        $group_id = $request->input('role_id');

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
            //'created_by' => $logged_user->id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        session()->flash('message', 'User has been created successfully.');
        return redirect('/users');
    }

    public function destroy(Acl $acl, $id)
    {
        $acl->has_permissions('delete_users');

        $user = User::find($id);
        if (!empty($user)) {
            $logged_user = auth()->user();
            if ($user->status == 1) {
                User::where('id', $id)->update(['status' => 0, 'updated_by' => $logged_user->id, 'updated_at' => date('Y-m-d H:i:s')]);
            } else {
                User::where('id', $id)->update(['status' => 1, 'updated_by' => $logged_user->id, 'updated_at' => date('Y-m-d H:i:s')]);
            }
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
        }
        return back();
    }

    public function edit(Acl $acl, $id)
    {
        $acl->has_permissions('edit_users');
        $data['users'] = User::find($id);
        $data['groups'] = Group::select('id', 'name')->get();
        return view('users.edit', $data);
    }

    public function update(Acl $acl, Request $request, $id)
    {
        $acl->has_permissions('change_users');

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,' .$id,
            'password' => 'required',
            'mobile' => 'required|unique:users,mobile,' .$id,
            'group' => 'required'
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        $logged_user = auth()->user();
        $full_name = $request->input('name');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $password = $request->input('password');
        $group = $request->input('group');

        User::where('id', $id)->update([
            'full_name' => $full_name,
            'email' => $email,
            'mobile' => $mobile,
            'password' => Hash::make($password),
            'group_id' => $group,
            'updated_by' => $logged_user->id,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        session()->flash('message', 'User has been updated successfully.');
        return redirect('/users');
    }

}
