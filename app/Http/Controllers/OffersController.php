<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Cicles;
use App\Offers;
use App\Applied;
use WithFileUploads;

class OffersController extends Controller
{
    

    public function index(Request $request){

        $cicles=cicles::all();
		$applies=Applied::where('user_id','!=',auth()->id())->with(['offer'])->paginate(10);
		return view('users.offers.index', compact('cicles','applies'));

	}
    

    public function aplicar(Request $request,Offers $id){
        $user = $request->user();
        $applied = Applied::all();

        if($applied->offer_id == $id && $applied->user_id == $user){

			
				return redirect()->route('offers.index')->with('message', 'FELICIDADES! Oferta aplicada correctamente');
				
			
				return redirect()->route('offers.index')->with('messageError', 'ERROR!!! Oferta no aplicada');
			
		
			$user->actived = 0;
			$offer->deleted = 1;
			$offer->update();
			return redirect()->route('offers.index');
		}

        
		return view('offers.index', compact('offers','cicles'));

	}
}