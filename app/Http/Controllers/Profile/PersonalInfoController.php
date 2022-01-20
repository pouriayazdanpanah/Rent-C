<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $profile = Auth::user()->image;
        return view('profile.personal_info' , compact('profile'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UserEditRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserEditRequest $request ,User $user)
    {
        $data = $request->validated();

       $user->update($data);

        alert()->success('Your info successfully changed','The operation was successful')->autoclose(4000);

        return back();
    }

    public function uploadImage(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:5120'
        ]);

        $file = $request->file('image');
        $path = "/img/users/" . Auth::user()->id . "/";
        $fileName = Auth::user()->name . '-' . Auth::user()->last_name . "." . $file->getClientOriginalExtension();
        $fileSize = $file->getSize();

        if (!is_null(Auth::user()->image))
        {
            Auth::user()->image()->delete();
        }

        $file->move(public_path($path),$fileName);

        Auth::user()->image()->create([
            'url' => $path.$fileName,
            'type' => $file->getClientOriginalExtension(),
            'size' => $fileSize,
        ]);

        return back();

    }

    public function deleteImage()
    {
        File::delete(public_path(Auth::user()->image->url));
        Auth::user()->image()->delete();

        return response()->json([
            'status' => true
        ]);
    }

}

