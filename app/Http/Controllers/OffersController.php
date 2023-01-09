<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Cicles;
use App\Offers;
use WithFileUploads;

class OffersController extends Controller
{
    

    public function index(Request $request){

        $offers=Offers::paginate(10);
		return view('offers.index', compact('offers'));
		
		
	}
}