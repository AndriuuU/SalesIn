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

	protected function store(Request $request)
    {
        // $file = request()->file('image')->store('public');
        
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);
        $file = $request -> file('image');
        $file2 = $request->$file->store('public/images');
        
        \Storage::disk("image")->put($name, \File::get($file));
        // if (request()->hasFile('image')) {
        //     $file = request()->file('image')->store('public/images');
        //     $articles = new Articles;   
        //     $articles->title         = $request->get('title');
        //     $articles->description = $request->get('description');
        //     $articles->cicle_id     = $request->get('cicle_id');
        //     $articles->image = $file;
        //     $articles.save();
        // }
        return Articles::create([
            'title' => $request['title'],
            'image' => $file2,
            'description' => $request['description'],
            'cicle_id' => $request['cicle_id'],
        ]);
        return  back()->with('status', 'Image Has been uploaded')->with('image',$name);
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

    public function editar(Articles $article)
    {   
        // $article = Auth::article();
        
        $article=Articles::find($article->id);
        $cicles=cicles::all();
        return view('articles.edit', compact('article','cicles'));
        //return view('articles.edit');
    }

	public function update(Articles $article)
    { 
        
        
        $this->validate(request(), [
				'title' => 'required|max:255|unique:articles', //Creo que lo de unico hay que quitarlo (NO SE)
                'description' =>'required|max:255',
                'cicle_id' => 'required',
				// 'image' => 'required|image|mimes:jpg,png,jpeg',	
            ]);

            $article->title = request('title');
            $article->description = request('description');
            $article->cicle_id = request('cicle_id');
			$article->image = request('image');
            $article->save();
            // return back();
        return redirect()->route('articles.index')->with('message','FELICIDADES! Noticia actualizada correctamente');
    }

    public function eliminar(Articles $article) {
		$article = Articles::find($article->id);
        $article->deleted = 1;
        $article->update();

        return redirect()->route('articles.index')->with('message','FELICIDADES! Noticia eliminado correctamente');
    }
    
}
