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

        $userId = auth()->id();
        $offers = Offers::select('offers.id', 'offers.title', 'offers.description', 'offers.num_candidates','offers.cicle_id', 'offers.created_at', 'offers.updated_at', 'offers.deleted', 'applieds.offer_id', 'applieds.user_id')
                ->leftJoin('applieds', function($join) use ($userId) {
                 $join->on('offers.id', '=', 'applieds.offer_id')
                      ->where('applieds.user_id', '=', $userId);
              })
              ->whereNull('applieds.id')
              ->where('offers.deleted', 0)
              ->get();
        $cicles=cicles::all();
		
		return view('offers.index', compact('offers','cicles'));

	}
    

    public function aplicar(Request $request,Offers $offer){
        $user = $request->user();
		$oferta = Offers::find($offer->id);
        //$applied = Applieds::all();
		
		
        $appliednew = new Applied; 
        $appliednew->offer_id = $oferta->id;
        $appliednew->user_id = $user->id;
        
		$appliednew->save();

		$oferta->num_candidates=1+$oferta->num_candidates;
		$oferta->save();


        // $userId = auth()->id();
        // $offers = Offers::select('offers.id', 'offers.title', 'offers.description', 'offers.num_candidates', 'offers.created_at', 'offers.updated_at', 'offers.deleted', 'applieds.offer_id', 'applieds.user_id')
        //         ->leftJoin('applieds', function($join) use ($userId) {
        //          $join->on('offers.id', '=', 'applieds.offer_id')
        //               ->where('applieds.user_id', '=', $userId);
        //       })
        //       ->whereNull('applieds.id')
        //       ->where('offers.deleted', 0)
        //       ->get();
              
        
        // $cicles=cicles::all();


        // if($applied->offer_id == $id && $applied->user_id == $user){

			
	
			
				
			
		
			
		// 	return redirect()->route('users.index')->with('message', 'FELICIDADES! Usuario desvalidado correctamente');
		// }

        // return redirect()->route('offers.index')->with('message', 'FELICIDADES!');
		// return view('offers.index', compact('offers','cicles'));

        return redirect()->route('offers.index')->with('message','Oferta guardada con exito');
	}
}