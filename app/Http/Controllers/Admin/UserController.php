<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public array $userTypes = ['Support','Vendor','User'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->get();
        return view('admin.User.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = $this->userTypes;
        return view('admin.User.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','string','min:8'],
            'type'=>['required',Rule::in($this->userTypes)],
        ]);
        $data = $request->only('name','email');
        $password = Hash::make($request->password);
        $has = Str::lower($request->type);

        $data = array_merge($request->only('name','email'),compact('password','has'));

        User::create($data);

        return redirect()->route('admin.user.index')->with('success','SuccessFully Saved User');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.User.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
           $types = $this->userTypes;
        return view('admin.User.edit',compact('user','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
        'name'=>['required','string'],
        'email'=>['required','email',Rule::unique('users','email')->whereNot('email',$user->email)],
        'password'=>['nullable','string','min:8'],
        'type'=>['required',Rule::in($this->userTypes)],
        ]);

          $data = $request->only('name','email');
          $has = Str::lower($request->type);
          $data = array_merge($request->only('name','email'),compact('has'));

          if($request->password){
            $password = Hash::make($request->password);
            $data['password'] = $password;
          }

          $user->update($data);

            return redirect()->route('admin.user.index')->with('success','SuccessFully Saved User');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
         return redirect()->back()->with('success','SuccessFully Saved User');
    }
}
