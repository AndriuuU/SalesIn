<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Cicles;
use WithFileUploads;

class ArticlesController extends Controller
{
    

    public function index(Request $request){

        $articles=Articles::paginate(5);
		return view('articles.index', compact('articles'));
		// return view('articles.index');
		
	}

	public function create() {
		$cicles=cicles::all();
    
        return view('articles.create', compact('cicles'));
    }

	protected function add(Request $request)
    {
        
        return Articles::create([
            'title' => $request['title'],
            'image' => $request['image'],
            'description' => $request['description'],
            'cicle_id' => $request['cicle_id'],
        ]);
    }

	protected function validator(Request $request)
    {   
        return Validator::make($request, [
            'title' => ['required', 'string', 'max:255'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'description' => ['required', 'string', 'max:255'],
            'cicle_id' => ['required', 'int'],
        ]);
        
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($articles = $this->create($request->all())));

        return redirect($this->redirectPath())->with('message', 'Se insertó correctamente');
    }

    
}
