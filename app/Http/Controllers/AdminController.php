<?php

namespace instablog\Http\Controllers;

use Illuminate\Http\Request;

use instablog\Http\Requests;
use instablog\Http\Controllers\Controller;
use instablog\User;
use instablog\Post;
use instablog\Role;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
        	'user' => User::find($id),
        	'roles' => Role::all()
        	);
        return view('admin.modify', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd(Input::all());
        $role_id = Input::get('role');
        $user = User::find($id);
        
        if($role_id == 0) {

        	$user->roles()->detach();

        } else {

        	$user->roles()->detach();
        	$user->roles()->attach($role_id);

        }

        return back()->with('success', 'User permission updated.');
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
