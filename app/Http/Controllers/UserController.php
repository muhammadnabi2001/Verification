<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        //dd(123);
        $users=User::orderBy('id','desc')->get();
        return view('User.users',['users'=>$users]);
    }
    public function usercreate()
    {
        return view('User.usercreate');
    }
    public function store(Request $request)
    {
        //dd(123);
        $data = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|max:50|min:5|email|unique:users,email',
            'password' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        return redirect('/users')->with('success', "Ma'lumot muvaffaqiyatli qo'shildi!");

    }
}
