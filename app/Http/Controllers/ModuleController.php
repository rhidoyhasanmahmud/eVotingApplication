<?php

namespace App\Http\Controllers;

use App\CoreMechanism\Acl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Module;

class ModuleController extends Controller
{

    public function index(Acl $acl)
    {
        $acl->has_permissions('view_modules');

        $data['modules'] = Module::all();

        return view('modules.index', $data);
    }


    public function create(Acl $acl)
    {
        $acl->has_permissions('add_modules');
        return view('modules.create');
    }

    public function store(Acl $acl, Request $request)
    {
        $acl->has_permissions('add_modules');

        $validator = Validator::make($request->all(), [
            'label' => 'required',
            'url' => 'required|unique:modules,url'
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        $label = $request->input('label');
        $url = $request->input('url');

        $module = new Module;
        $module->label = $label;
        $module->url = $url;
        $module->save();

        // Add dynamic permissions
        $only_system_modules = ['modules', 'permissions'];

        if (!in_array($url, $only_system_modules)) {
            if ($url == 'task') {
                $module->permissions()->createMany([
                    ['name' => 'View ' . ucwords($label), 'codename' => 'view_' . $url],
                    ['name' => 'View Client', 'codename' => 'view_client'],
                    ['name' => 'View Return Tax File', 'codename' => 'view_return_tax_file'],
                    ['name' => 'View Message', 'codename' => 'view_message'],
                    ['name' => 'File Upload Permissions', 'codename' => 'view_file_permissions'],
                ]);

            } elseif ($url == 'files') {
                $module->permissions()->createMany([
                    ['name' => 'View ' . ucwords($label), 'codename' => 'view_' . $url],
                    ['name' => 'Add ' . ucwords($label), 'codename' => 'add_' . $url],
                    ['name' => 'Delete ' . ucwords($label), 'codename' => 'delete_' . $url],
                    ['name' => 'Can Tax File Submit ', 'codename' => 'can_file_submit'],
                ]);
            } elseif ($url == 'assign') {
                $module->permissions()->createMany([
                    ['name' => 'View ' . ucwords($label), 'codename' => 'view_' . $url],
                    ['name' => 'Change ' . ucwords($label), 'codename' => 'change_' . $url],
                ]);
            } elseif ($url == 'message') {
                $module->permissions()->createMany([
                    ['name' => 'View Inbox' . ucwords($label), 'codename' => 'view_inbox' . $url],
                    ['name' => 'View Sent' . ucwords($label), 'codename' => 'view_sent' . $url],
                    ['name' => 'View Message' . ucwords($label), 'codename' => 'show_message' . $url],
                    ['name' => 'Write Message' . ucwords($label), 'codename' => 'write_compose' . $url],
                ]);
            } else {
                $module->permissions()->createMany([
                    ['name' => 'View ' . ucwords($label), 'codename' => 'view_' . $url],
                    ['name' => 'Add ' . ucwords($label), 'codename' => 'add_' . $url],
                    ['name' => 'Change ' . ucwords($label), 'codename' => 'change_' . $url],
                    ['name' => 'Delete ' . ucwords($label), 'codename' => 'delete_' . $url]
                ]);
            }
        }

        session()->flash('message', 'Module has been created successfully.');
        return redirect('/modules');
    }


    public function edit(Acl $acl, $id)
    {
        $acl->has_permissions('change_modules');

        $data['module'] = Module::find($id);

        return view('modules.edit', $data);
    }

    public function update(Acl $acl, Request $request, $id)
    {
        $acl->has_permissions('change_modules');

        $validator = Validator::make($request->all(), [
            'label' => 'required'
        ]);

        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        $label = $request->input('label');

        Module::where('id', $id)->update(['label' => $label]);

        session()->flash('message', 'Module has been updated successfully.');
        return redirect('/modules');
    }

    public function destroy(Acl $acl, $id)
    {
        $acl->has_permissions('delete_modules');

        $module = Module::find($id);
        if (!empty($module)) {
            $module->delete();
            session()->flash('message', 'Module has been deleted successfully.');
        } else {
            session()->flash('message', 'Somethings wents wrong');
            session()->flash('alert_tag', 'alert-danger');
        }
        return redirect('/modules');
    }
}
