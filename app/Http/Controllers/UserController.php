<?php

namespace instablog\Http\Controllers;

use Illuminate\Http\Request;

use instablog\Http\Requests;
use instablog\Http\Requests\UpdateUserRequest;
use instablog\Http\Controllers\Controller;
use instablog\User;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array('user' => User::find($id));

        return view('users.profile', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        // dd(Input::all());
        $user = User::find($id);

        $user->name = Input::get('name');
        $user->email = Input::get('email');

        if(Input::get('password')) {
            $user->password = bcrypt(Input::get('password'));
        }

        $user->save();

        return redirect('user/' . $id)->with('success', 'Your profile was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
