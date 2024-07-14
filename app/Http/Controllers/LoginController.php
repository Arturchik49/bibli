<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;


class LoginController extends Controller
{
    public function admin(){
        $users = DB::table('users')->get();
        return view('admin', ['users' => $users]);
    }
    public function addUser(Request $request){
        // Получение данных из формы
        $username = $request->input('username');
        $role = $request->input('role');
        $email = $request->input('email');
        $password = $request->input('password');

        DB::table('users')->insert([
            'username' => $username,
            'role' => $role,
            'email' => $email,
            'password' => $password
        ]);
        Mail::to($email)->send(new WelcomeEmail($email, $password));
        return redirect('/admin');
    }

    public function deleteUser($id){

        DB::table('users')->where('id', $id)->delete();

        return redirect('/admin');
    }
}
