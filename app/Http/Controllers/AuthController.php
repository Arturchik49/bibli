<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        if ($user) {
            switch ($user->role) {
                case 'admin':
                    $redirectUrl = '/admin';
                    break;
                case 'librarian':
                    $redirectUrl = '/libr';
                    break;
                case 'client':
                    $redirectUrl = '/home';
                    break;
                default:
                    $redirectUrl = '/error';
                    break;
            }
        } else {
            $redirectUrl = '/error';
        }
        return redirect($redirectUrl);
    }
}
