<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Lang;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function AllRole()
    {
        // if (!auth()->user()->can('role.view')) {
        //     abort(403, 'Unauthorized action.');
        // }
        $roles = Role::paginate(10);
        // dd($roles);
        return view('role.index', compact('roles'));
    }

    public function AddRole()
    {
        // if (!auth()->user()->can('create.role')) {
        //     abort(403, 'Unauthorized action.');
        // }
        return view('role.create');
    }

    public function StoreRole(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permissions' => 'required'
        ]);
        $name      = $request->input('name');
        $permissions    = $request->input('permissions');
        $count = Role::where('name', $name)->count();
        if ($count == 0) {

            $roles = new Role();
            $roles->name = request('name');
            $roles->save();
            // return 1;
            $this->__createPermissionIfNotExists($permissions);

            if (!empty($permissions)) {
                $roles->syncPermissions($permissions);
            }
            $output = [
                'success' =>_('Create successfully'),
            ];
            return redirect()->route('role.index')->with($output);
        } else {
            $output = [
                'error' =>_('Something went wrong')
            ];
            return redirect()->route('role.index')->with($output);
        }
    }
    public function EditRole($id)
    {
        // if (!auth()->user()->can('edit.role')) {
        //     abort(403, 'Unauthorized action.');
        // }
        $role = Role::with(['permissions'])->find($id);
        $role_permissions = [];
        foreach ($role->permissions as $role_perm) {
            $role_permissions[] = $role_perm->name;
        }
        return view('role.edit', compact('role', 'role_permissions'));
    }

    public function UpdateRole(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permissions' => 'required'
        ]);
        $name      = $request->input('name');
        $permissions    = $request->input('permissions');

        $count = Role::where('name', $name)->where('id', '!=', $id)->count();
        if ($count == 0) {
            $role           = Role::findOrFail($id);
            $role->name     = $name;
            $role->save();
            // return 1;
            $this->__createPermissionIfNotExists($permissions);

            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }
            $output = [
                'success' =>_('Update successfully')
            ];
            return redirect()->route('role.index')->with($output);
        } else {
            $output = [
                'error' =>_('Something went wrong')
            ];
            return redirect()->route('role.index')->with($output);
        }
    }

    public function DestroyRole($id)
    {
        try {
            DB::beginTransaction();
            $role = Role::find($id);
            $role->delete();

            DB::commit();
            $output = [
                'success' =>_('Delete successfully')
            ];
        } catch (Exception $e) {
            DB::rollBack();
            $output = [
                'error' =>_('Something went wrong')
            ];
        }
        return redirect()->route('role.index')->with($output);
    }

    private function __createPermissionIfNotExists($permissions)
    {

        $exising_permissions = Permission::whereIn('name', $permissions)
            ->pluck('name')
            ->toArray();

        $non_existing_permissions = array_diff($permissions, $exising_permissions);
        if (!empty($non_existing_permissions)) {

            foreach ($non_existing_permissions as $new_permission) {
                $time_stamp = Carbon::now()->toDateTimeString();
                Permission::create([
                    'name' => $new_permission,
                    'guard_name' => 'web'
                ]);
            }
        }
    }
}
