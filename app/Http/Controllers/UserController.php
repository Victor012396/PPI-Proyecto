<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _constructor()
    {
        $this->middleware('auth')->except('show');

    }
    
     public function index()
    {
        $user = user::all();
        return view('user.index',compact('user'));
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
        $request->validate([
            'name'=>['required'],
            'email'=>['required'],
            'location'=>['required'],
            'phone'=>['required'],
            'about'=>['required'],
        ]);
        user::create($request->all());
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $request->validate([
            'name'=>['required'],
            'email'=>['required'],
            'location'=>['required'],
            'phone'=>['required'],
            'about'=>['required'],
        ]);
        $user->update($request->all());
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

    public function profile()
    {
        $user=auth()->user();
        return redirect()->route('user.profile');
    }

    public function profupdate(Request $request, user $user)
    {
        $request->validate([
            'name'=>['required'],
            'email'=>['required'],
            'location'=>['required'],
            'phone'=>['required'],
            'about'=>['required'],
        ]);
        $user->update($request->all());
        return redirect()->route('user.profile');
    }

}
