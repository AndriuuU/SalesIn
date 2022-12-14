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

    // public function editar(Article $article)
    // {   
    //     $article = Auth::article();

    //     return view('articles.edit');
    // }

	// public function update(User $user)
    // { 
    //     if(Auth::user()->email == request('email')) {
        
    //     $this->validate(request(), [
	// 			'name' => 'required|max:255|unique:users',
	// 			'surname' => 'required|max:255|unique:users',
	// 			'cicle_id' => 'required',
	// 		 	'email' => 'required|email|max:255|unique:users',
	// 			'password' => 'required|min:8|confirmed'	
    //         ]);

    //         $user->name = request('name');
	// 		$user->surname = request('surname');
	// 		$user->cicle_id = request('cicle_id');
    //         $user->email = request('email');
    //         $user->password = bcrypt(request('password'));
    //         $user->save();
    //         return back();
            
    //     }
    //     else{
            
    //     $this->validate(request(), [
	// 			'name' => 'required|max:255|unique:users',
	// 			'surname' => 'required|max:255|unique:users',
	// 			'cicle_id' => 'required',
	// 			'email' => 'email|required|unique:users,email,'.$this->segment(2),
	// 			'password' => 'required|min:8|confirmed'
    //         ]);

	// 		$user->name = request('name');
	// 		$user->surname = request('surname');
	// 		$user->cicle_id = request('cicle_id');
    //         $user->email = request('email');
    //         $user->password = bcrypt(request('password'));

    //         $user->save();

    //         return back();  
            
    //     }
    // }

    public function eliminar(Articles $article) {
		$article = Articles::find($article->id);
        $article->deleted = 1;
        $article->update();

        return redirect()->route('articles.index')->with('message','FELICIDADES! Noticia eliminado correctamente');
    }
    
}
