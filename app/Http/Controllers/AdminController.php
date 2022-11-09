<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class AdminController extends Controller
{
	public function index(Request $request){

		$user = $request->user();
		if ($user->type=="A") {
			$users=User::all();
			return view('users.index', compact('users')) ->with('i', (request()->input('page', 1) - 1) * 5);
		}else{
			return "NO ERES ADMIN";
		}
		return "NO HAS INICIADO SESION";
	}

	public function create() {
        return view('users.create');
    } 

	public function editar(User $user, Request $request) {
    
		$user = User::find($user->id);
		
		$request->validate([
		  'name' => ['required', 'string', 'max:255'],
				'surname' => ['required', 'string', 'max:255'],
				'cicle_id' => ['required', 'int'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],    
				'password' => ['required', 'string', 'min:8', 'confirmed'],
			]);
	
			$user =Auth::user();
			$user->name = $request['name'];
			$user->email = $request['surname'];
			$user->name = $request['cicle_id'];
			$user->email = $request['email'];
			$user->email = $request['password'];
			$user->save();
			return redirect()->route('users.edit')->with('message', 'Profile updated.');
			return view('edit');
	
	  }

	public function validar(User $user) {
		$user = User::find($user->id);
		if($user->actived == 0){

			if($user->email_verified_at!=null){
				$user->actived = 1;
				$user->update();
				return redirect()->route('users.index')->with('message', 'FELICIDADES! Usuario Validado correctamente');
				
			}else{
				return redirect()->route('users.index')->with('messageError', 'ERROR!!! Usuario No ha verificado el correo');
			}
		}else {
			$user->actived = 0;
			$user->update();
			return redirect()->route('users.index')->with('message', 'FELICIDADES! Usuario desvalidado correctamente');
		}

        
    }

	public function eliminar(User $user) {
		$user = User::find($user->id);
        $user->deleted = 1;
        $user->update();

        return redirect()->route('users.index')->with('message','FELICIDADES! Usuario eliminado correctamente');
    }
}

