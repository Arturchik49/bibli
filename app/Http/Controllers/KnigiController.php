<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Knigi;

class KnigiController extends Controller
{
    public function showBooks()
    {
        $knigi = knigi::all();
        return view('books', ['knigi' => $knigi]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $books = Knigi::where('nazvanie', 'like', '%'.$query.'%')
            ->orWhere('zhanr', 'like', '%'.$query.'%')
            ->orWhere('izdanie', 'like', '%'.$query.'%')
            ->orWhere('avtor', 'like', '%'.$query.'%')
            ->get();

        return view('search_results', ['books' => $books]);
    }

}

