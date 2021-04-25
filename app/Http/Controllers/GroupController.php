<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\Group;
use App\CoreMechanism\Acl;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class GroupController extends Controller
{

    public function index(Acl $acl)
    {
        
        $acl->has_permissions('view_groups');

        $data['groups'] = Group::all()->where('display', 1);

        return view('groups.index', $data);
    }


    public function create(Acl $acl)
    {
        $acl->has_permissions('add_groups');

        return view('groups.create');
    }


    public function store(Acl $acl, Request $request)
    {
        $acl->has_permissions('add_groups');

        $validator = Validator::make($request->all(), [
            'name' => 'required |unique:groups,name',
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }
        $name = $request->input('name');

        Group::insert(['name' => $name]);

        session()->flash('message', 'Group has been created successfully.');
        return redirect('/groups');
    }


    public function edit(Acl $acl, $id)
    {
        $acl->has_permissions('change_groups');

        $data['groups'] = Group::find($id);

        return view('groups.edit', $data);
    }


    public function update(Acl $acl, Request $request, $id)
    {
        $acl->has_permissions('change_groups');

        $validator = Validator::make($request->all(), [
            'name' => 'required |unique:groups,name,' . $id,
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        $name = $request->input('name');

        Group::where('id', $id)->update(['name' => $name]);

        session()->flash('message', 'Group has been updated successfully.');
        return redirect('/groups');
    }


    public function destroy(Acl $acl, $id)
    {
        $acl->has_permissions('delete_groups');

        $groups = Group::find($id);
        if (!empty($groups)) {
            $groups->delete();
            session()->flash('message', 'Group has been deleted successfully.');
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
        }
        return redirect('/groups');
    }


    public function showPermissions(Acl $acl, $id)
    {
        $acl->has_permissions('group_permissions');

        $data['group'] = $group = Group::find($id);
        $data['group_permissions'] = $group->permissions()->pluck('permission_id')->toArray();

        $data['modules'] = Module::whereNotIn('url', ['modules', 'permissions'])->get();

        return view('groups.permissions', $data);
    }

    public function submitPermissions(Acl $acl, Request $request, $id)
    {
        $acl->has_permissions('group_permissions');

        $group = Group::find($id);
        if (!empty($group)) {
            $group->permissions()->sync($request->input('permission_id'));
            session()->flash('message', 'Permission Set successfully.');
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
        }
        return redirect('/groups');
    }
}
