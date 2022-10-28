<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
	public function index(){
		$users=User::all();
        dd($users);
        // return "Hola desde el nuevo controlador";
	}
}

