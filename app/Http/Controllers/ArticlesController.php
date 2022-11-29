<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

class ArticlesController extends Controller
{
    public function index(Request $request){

        $articles=Articles::all();
		return view('articles.index', compact('articles')) ->with('i', (request()->input('page', 1) - 1) * 5);
		// return view('articles.index');
		
	}
}
