<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Otzyv;

class OtzyvController extends Controller
{
    public function addOtzyv(Request $request) {
        $otzyv = new Otzyv();
        $otzyv->name = $request->input('name');
        $otzyv->kniga = $request->input('kniga');
        $otzyv->sms = $request->input('sms');
        $otzyv->save();
        return redirect('/otzyv');
    }
    public function otzyv()
    {
        $otzyv = Otzyv::all();
        return view('otzyv', ['otzyv' => $otzyv]);
    }
}
