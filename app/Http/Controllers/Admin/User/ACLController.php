<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ACLController extends Controller
{

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(User $user)
    {
        return view('admin.user.ACL' ,compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request,User $user)
    {
//dd($request->roles);
        $user->roles()->sync($request->roles);

        $user->permissions()->sync($request->permissions);

        alert()->success('Your permission and role successfully created', 'success')->autoclose(5000);

        return redirect(route('admin.user.index'));
    }

}
