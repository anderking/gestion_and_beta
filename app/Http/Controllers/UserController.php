<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\UsersUpdateRequest;

use Cache;
use File;
use Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $rol = DB::table('roles')->select('display_name')->where('id', $user->role_id)->first();
        
        return view('user.show')->with(['user'=>$user,'rol'=>$rol]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $password = $user->password;
        $user->fill($request->all());
        
        if ($request->password!="")
            $user->password = bcrypt($request->password);
        else
            $user->password = $password ;

        if ($request->file('avatar'))
        {
            $file = $request->file('avatar');
            $name = 'dcyt_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\img';
            $file->move($path,$name);
            $user->avatar = $name;
        }

        $user->update();

        $user->update();
        return redirect()->route('user.edit',$id)->with('status','Se ha actualizado el usuario');
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
