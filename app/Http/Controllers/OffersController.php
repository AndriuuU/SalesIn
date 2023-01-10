<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Cicles;
use App\Offers;
use App\Applieds;
use WithFileUploads;

class OffersController extends Controller
{
    

    public function index(Request $request){

        $offers=Offers::paginate(10);
        $cicles=cicles::all();
		return view('offers.index', compact('offers','cicles'));

	}
    

    public function aplicar(Request $request,Offers $id){
        $user = $request->user();
        $applied = Applieds::all();
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

        
		return view('offers.index', compact('offers','cicles'));

	}
}