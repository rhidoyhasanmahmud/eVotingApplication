<?php

namespace App\Http\Controllers;

use App\CoreMechanism\Acl;
use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;
use App\Models\Module;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Acl $acl)
    {
        $acl->has_permissions('view_permissions');

        $data['permissions'] = Permission::all();
        
        return view('permissions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Acl $acl)
    {
        $acl->has_permissions('add_permissions');
        $data['modules'] = Module::select('id', 'label')->get();
        return view('permissions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Acl $acl, Request $request)
    {
        $acl->has_permissions('add_permissions');

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'codename' => 'required|unique:permissions,codename',
            'module' => 'required'
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }
        $name = $request->input('name');
        $codename = $request->input('codename');
        $module_id = $request->input('module');

        Permission::insert(['name' => $name, 'codename' => $codename, 'module_id' => $module_id]);

        session()->flash('message', 'Permission has been created successfully.');
        return redirect('/permissions');
    }


    public function edit(Acl $acl, $id)
    {
        $acl->has_permissions('change_permissions');

        $data['permission'] = Permission::find($id);
        $data['modules'] = Module::select('id', 'label')->get();

        return view('permissions.edit', $data);
    }


    public function update(Acl $acl, Request $request, $id)
    {
        $acl->has_permissions('change_permissions');

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'module' => 'required'
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        $name = $request->input('name');
        $module_id = $request->input('module');

        Permission::where('id', $id)->update(['name' => $name, 'module_id' => $module_id]);

        session()->flash('message', 'Permission has been updated successfully.');
        return redirect('/permissions');
    }


    public function destroy(Acl $acl, $id)
    {
        $acl->has_permissions('delete_permissions');

        $permission = Permission::find($id);
        if (!empty($permission)) {
            $permission->delete();
            session()->flash('message', 'Permission has been deleted successfully.');
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
        }
        return redirect('/permissions');
    }
}
