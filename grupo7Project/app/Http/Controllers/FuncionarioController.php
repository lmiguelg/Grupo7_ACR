<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FuncionarioController extends Controller
{
    //
    public function __construct()
    {
        return view('home');

    }

    public function index() {

        return dd('estou aqui');

    }

    public function registoValidate(Request $request){

        $this->validate(request(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'username'=>['required', 'unique:users'],
            'category' =>['required']
        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->username = $request['username'];
        $user->category = $request['category'];

        $user->save();



    }



}

