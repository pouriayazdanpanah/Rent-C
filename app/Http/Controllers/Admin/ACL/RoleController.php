<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->middleware('can:show-roles')->only(['index']);
        $this->middleware('can:create-roles')->only(['create','store']);
        $this->middleware('can:edit-roles')->only(['edit','update']);
        $this->middleware('can:delete-roles')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $roles = Role::paginate(10);

        return view('admin.role.roles' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255','unique:roles'],
            'permissions' => ['required', 'array'],
            'label' => ['required', 'string', 'max:255'],
        ]);

        $permission_role = Role::create($data);
        $permission_role->permissions()->sync($data['permissions']);

        alert()->success('The Role successfully created','Successfully created')->autoclose(3000);

        return redirect(\route('admin.role.index'));
    }

    /**
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Role $role)
    {
        $permissions = $role->permissions;

        return view('admin.role.show',compact('role' , 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
       return view('admin.role.edit' ,compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255',Rule::unique('roles')->ignore($role->id)],
            'permissions' => ['required', 'array'],
            'label' => ['required', 'string', 'max:255'],
        ]);

        $role->update($data);
        $role->permissions()->sync($data['permissions']);

        alert()->success('The Role successfully updated','Successfully updated')->autoclose(3000);

        return redirect(route('admin.role.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Role $role)
    {
        $role->delete();

        alert()->info('The Role successfully deleted','Successfully deleted')->autoclose(3000);

        return redirect(route('admin.role.index'));
    }
}
