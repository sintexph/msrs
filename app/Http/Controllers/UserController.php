<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'contact_number' => 'string|required',
            'email' => 'string|required',
            'department' => 'string|required',
            'username' => 'string|required',
            'password' => 'string|required|min:6',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->contact_number = $request->contact_number;
        $user->email = $request->email;
        $user->department = $request->department;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->isAdmin = $request->isAdmin == 1 ? 1 : 0;

        $user->save();

        redirect('/request');
        return response()->json(['message' => 'User Successfully Saved!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $username = $user->username;
        $password = $user->password;

        $user = User::where('username', '=', $username)->first();

        if($user == null)
        {
            abort(404, 'User not found!');
        }

        if(!Hash::check($password, $user->password))
        {
            abort(404, 'Incorrect Credentials');
        }

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($user == null)
        {
            abort(403, 'User Profile not found!');
        }

        $validation = [
            'name' => 'string|required',
            'contact_number' => 'string|required',
            'email' => 'string|required',
            'department' => 'string|required',
            'username' => 'string|required',
        ];

        if(!empty($request->password))
        {
            $validation['validation'] = 'string|required';
        }

        $this->validate($request, $validation);

        $user->name = $request->name;
        $user->contact_number = $request->contact_number;
        $user->email = $request->email;
        $user->department = $request->department;
        $user->username = $request->username;
        $user->isAdmin = $request->isAdmin == 1 ? 1 : 0;
        if(!empty($request->password))
        {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('users')->with('update_message', 'Request Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = User::find($id);

        if($user == null)
        {
            abort(404, 'User not found!');
        }

        $user->delete();

        return response()->json(['message' => 'User successfully removed!']);
    }
}
