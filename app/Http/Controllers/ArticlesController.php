<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Cicles;
use WithFileUploads;

class ArticlesController extends Controller
{
    

    public function index(Request $request){

        $articles=Articles::all();
		return view('articles.index', compact('articles')) ->with('i', (request()->input('page', 1) - 1) * 5);
		// return view('articles.index');
		
	}

	public function create() {
		$cicles=cicles::all();
    
        return view('articles.create', compact('cicles'));
    }

	protected function add(array $data)
    {
        
        return Articles::create([
            'title' => $data['title'],
            'image' => $data['image'],
            'description' => $data['description'],
            'cicle_id' => $data['cicle_id'],
        ]);
    }

	protected function validator(array $data)
    {   
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'description' => ['required', 'string', 'max:255'],
            'cicle_id' => ['required', 'int'],
        ]);
        
    }

    
}
