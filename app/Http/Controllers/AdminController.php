<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class AdminController extends Controller
{
	public function index(){
		$users=User::all();
        return view('users.index', compact('users')) ->with('i', (request()->input('page', 1) - 1) * 5);
        //return "Hola desde el nuevo controlador";
	}

	public function create() {
        return view('users.create');
    } 

	public function verify(User $user) {
		$user->actived=1;
		$user->email_verified_at = now();
		return view('users.index', compact('user'));
    }

	public function destroy(User $user) {
        $user->delete();
  
        return redirect()->route('users.index')->with('Felicidades','Usuario eliminado correctamente');
    }
}

