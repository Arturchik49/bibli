<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BronController extends Controller
{
    public function bron(){
        $knigis = DB::select('SELECT * FROM knigis');
        $zabron_knigis = DB::select('SELECT * FROM zabron_knigi');
        return view('bron', ['knigis' => $knigis, 'zabron_knigis' => $zabron_knigis]);
    }
    public function bronKnigu($id)
    {
        $book = DB::selectOne('SELECT * FROM knigis WHERE id = ?', [$id]);
        DB::insert('INSERT INTO zabron_knigi (nazvanie, zhanr, izdanie, avtor) VALUES (?, ?, ?, ?)', [
            $book->nazvanie,
            $book->zhanr,
            $book->izdanie,
            $book->avtor
        ]);
        DB::delete('DELETE FROM knigis WHERE id = ?', [$id]);
        return redirect('/bron');
    }
    public function zabronKnigi()
    {
        $zabron_knigis = DB::select('SELECT * FROM zabron_knigi');
        return view('bron', ['zabron_knigis' => $zabron_knigis]);
    }
    public function snyatBron($id)
    {
        $book = DB::selectOne('SELECT * FROM zabron_knigi WHERE id = ?', [$id]);
        DB::insert('INSERT INTO knigis (nazvanie, zhanr, izdanie, avtor) VALUES (?, ?, ?, ?)', [
            $book->nazvanie,
            $book->zhanr,
            $book->izdanie,
            $book->avtor
        ]);
        DB::delete('DELETE FROM zabron_knigi WHERE id = ?', [$id]);
        return redirect('/bron');
    }
}
