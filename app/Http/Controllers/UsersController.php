<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('users.welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create variable
        $validatedData = $request->validate([
            'title' => [ 'required', 'string', 'max:255'],
            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
        $users = new Users();
        $users->title = $request->title;
        $users->lastname = $request->lastname;
        $users->email = $request->email;
        $users->role = $request->role;
        
        $users->save();
       
        return redirect()->route('main');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        return view('users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {

        $validatedData = $request->validate([
            'title' => ['bail', 'required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255']
        ]);
        $users->title = $request->title;
      
       
        $users->username = $request->username;
        $users->email = $request->email;
        $users->role = $request->role;  
        $users->save();
        return redirect()->route('main');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        $users->delete();
        return redirect()->route('main');
    }

    public function allList()
    {
        $users =  DB::table('users');
        if(auth()->user()->role != 'admin'){
            $users = $users->where('role', '<>', 'admin');
        }
        
        return view('users.index', ['users' => $users->paginate(5)]);
    }
}
