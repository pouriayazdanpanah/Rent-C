<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\User;
use \Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\True_;
use function GuzzleHttp\describe_type;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:show-user')->only('index');
        $this->middleware('can:delete-user')->only('destroy');
        $this->middleware('can:edit-user')->only(['edit' , 'update']);
        $this->middleware('can:create-user')->only(['create' , 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $data = User::query();

        $this->itemSearch($data);

        //get data user and paginate
        $users = $data->latest()->paginate(15);
//
        return view('admin.user.user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return  view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateUserRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //get validated data
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'position' =>['required'],

        ]);

        //be crypt password
        $data['password'] = Hash::make($data['password']);

        if ($data['position'] == 'admin'){
            unset($data['position']);
            $data['is_admin'] = 1;

        }else{
            unset($data['position']);
            $data['staff'] = 1;
        }

//        store user info
        $user = User::create($data);


        //set E-Mail validation
        if (\request('verify') == 'on')
        {
            $user->markEmailAsVerified();
        }

        if (\request('roles') || \request('permissions')){
            $user->roles()->sync(\request('roles'));
            $user->permissions()->sync(\request('permissions'));
        }

        alert()->success('User added successfully','Success')->autoclose(3000);

        return redirect(route('admin.user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('admin.user.edit' ,compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $user)
    {
        //validate data
        $data = $this->validated($request, $user);

       //check password field required
       if (! is_null($request->password))
           {
               $password = $this->passwordValidation($request);

               $data["password"] = Hash::make($password['password']);
           }


       $user->update($data);

       if ($request->has('verify'))
       {
           $user->markEmailAsVerified();
       }

       alert()->success('User information change successfully','Success')->autoclose(3000);

       return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        alert()->info('User deleted','Success')->autoclose(3000);

        return back();
    }

    /**
     * @param Request $request
     * @param User $user
     * @return array
     */
    public function validated(Request $request, User $user): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],

        ]);
        return $data;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function passwordValidation(Request $request): array
    {
        $data = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        return $data;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $data
     */
    public function itemSearch(\Illuminate\Database\Eloquent\Builder $data): void
    {
        if (Gate::allows('show-admin'))
        {
            if($keyWord = \request('admin'))
            {
                $data->where('is_admin',$keyWord)->orWhere('staff',$keyWord);
            }
        }
        else{
            $data->where('is_admin',0)->orWhere('staff',0);
        }
    }
}
