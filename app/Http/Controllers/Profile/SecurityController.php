<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\UiServiceProvider;

class SecurityController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $session = DB::table('sessions')->where('user_id',Auth::user()->id)->get();
        return view('profile.security',compact('session'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,User $user)
    {
        $validatedData = $request->validate([
            'password'=>['required', 'string', 'min:8', 'confirmed']
        ]);
        $user->update(['password'=> Hash::make($validatedData['password'])]);
        alert()->success('Your Password updated' , 'Success')->autoclose(3000);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sessions')->where('id' , $id)->delete();
        alert()->success('Session Logeouted' , 'Success')->autoclose(3000);
        return back();
    }
}
