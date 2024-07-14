<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibrController extends Controller
{
    public function libr()
    {
        return view('libr');
    }
    public function addBook(Request $request)
    {
        $nazvanie = $request->input('nazvanie');
        $zhanr = $request->input('zhanr');
        $izdanie = $request->input('izdanie');
        $avtor = $request->input('avtor');

        DB::table('knigis')->insert([
            'nazvanie' => $nazvanie,
            'zhanr' => $zhanr,
            'izdanie' => $izdanie,
            'avtor' => $avtor
        ]);
        return redirect('/libr');
    }
    public function deleteBook($id)
    {
        DB::table('knigis')->where('id', $id)->delete();
        return redirect('/libr');
    }
    public function vydacha()
    {
        $zabron_knigi = DB::table('zabron_knigi')->get();
        $vydannye_knigi = DB::table('vydannye_knigi')->get();
        $vozvrat_knig = DB::table('vozvrat_knig')->get();
        return view('vydacha', ['zabron_knigi' => $zabron_knigi, 'vydannye_knigi' => $vydannye_knigi, 'vozvrat_knig' => $vozvrat_knig]);
    }
    public function vydatKnigu($id)
    {
        $zabroni = DB::table('zabron_knigi')->where('id', $id)->first();
        DB::table('vydannye_knigi')->insert([
            'nazvanie' => $zabroni->nazvanie,
            'zhanr' => $zabroni->zhanr,
            'izdanie' => $zabroni->izdanie,
            'avtor' => $zabroni->avtor
        ]);
        DB::table('zabron_knigi')->where('id', $id)->delete();
        return redirect('/vydacha');
    }
    public function vozvratKnigi($id)
    {
        $kniga = DB::table('vydannye_knigi')->where('id', $id)->first();
        DB::table('knigis')->insert([
            'nazvanie' => $kniga->nazvanie,
            'zhanr' => $kniga->zhanr,
            'izdanie' => $kniga->izdanie,
            'avtor' => $kniga->avtor
        ]);
        DB::table('vydannye_knigi')->where('id', $id)->delete();

        return redirect('/vydacha')->with('bookReturned', $kniga);
    }
}
