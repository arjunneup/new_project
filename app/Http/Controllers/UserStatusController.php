<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserStatusController extends Controller
{

    public function __construct(){
        $this->middleware(function ($request, $next) {      
            abort_unless(auth()->user()->role == 'admin', 403);
            return $next($request);
        });
    }

    public function edit(User $user){
        return view('users.status.edit', ['user' => $user]);
    }

    public function update(User $user, Request $request){
        $user->status_id = $request->status == 1 ? 1 : 0;
        $user->save();
        return redirect()->to('/user');
    }


}
