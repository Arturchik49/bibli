<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MaiController extends Controller
{
    public function login(){
        return view('login');
    }
    public function home(){
        return view('home');
    }

    public function spisok(){
        return view('spisok');
    }
    public function error(){
        return view('error');
    }



}
