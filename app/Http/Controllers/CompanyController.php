<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Users;


class CompanyController extends Controller
{
    public function index()
    {
        return view('company.welcome');
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        //create variable
        $validatedData = $request->validate([
            'title' => ['bail', 'required', 'string', 'max:255'],
            'lastname' => ['required', 'required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
        $companies = new Users();
        $companies->title = $request->title;
        $companies->lastname = $request->lastname;
        $companies->username = $request->username;
        $companies->email = $request->email;
        $companies->role = $request->role;

        $companies->save();

        return redirect()->route('main');
    }
    public function show(Companies $companies)
    {
        //
    }
    public function edit(Users $users)
    {
        return view('company.edit', compact('users'));
    }

    public function update(Request $request, Users $users)
    {

        $validatedData = $request->validate([
            'title' => ['bail', 'required', 'string', 'max:255'],
            'lastname' => ['required', 'required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);
        $users->title = $request->title;
        $users->lastname = $request->lastname;
        $users->username = $request->username;
        $users->email = $request->email;
        $users->role = $request->role;
        $users->save();
        return redirect()->route('main');
    }
    public function destroy(Companies $companies)
    {
        $companies->delete();
        return redirect()->route('main');
    }
    public function allList()
    {

        return view('company.index', ['users' => DB::table('users')->paginate(10)]);
    }
}
