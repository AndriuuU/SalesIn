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
	}

	public function create() {
        return view('users.create');
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

