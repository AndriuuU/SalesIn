<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Cicles;


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
	
	public function editar(User $user)
    {   
        $user = Auth::user();
		$cicles=cicles::all();

        return view('users.edit', compact('user','cicles'));
    }

	public function update(User $user)
    { 
        if(Auth::user()->email == request('email')) {
        
        $this->validate(request(), [
				'name' => 'required|max:255|unique:users',
				'surname' => 'required|max:255|unique:users',
				'cicle_id' => 'required',
			 	'email' => 'required|email|max:255|unique:users',
				'password' => 'required|min:8|confirmed'	
            ]);

            $user->name = request('name');
			$user->surname = request('surname');
			$user->cicle_id = request('cicle_id');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));
            $user->save();
            return back();
            
        }
        else{
            
        $this->validate(request(), [
				'name' => 'required|max:255|unique:users',
				'surname' => 'required|max:255|unique:users',
				'cicle_id' => 'required',
				'email' => 'email|required|unique:users,email,'.$this->segment(2),
				'password' => 'required|min:8|confirmed'
            ]);

			$user->name = request('name');
			$user->surname = request('surname');
			$user->cicle_id = request('cicle_id');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));

            $user->save();

            return back();  
            
        }
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

