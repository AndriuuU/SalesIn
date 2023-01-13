<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class InformesController extends Controller
{
    public function download()
{
    $data = [
        'titulo' => 'Styde.net'
    ];
    
    return PDF::loadView('pdf', $data)
        ->stream('archivo.pdf');
}

}
