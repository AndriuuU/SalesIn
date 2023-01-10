@extends('offers.layout') 
@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">                
            </div>
        </div>
    </div>
	<br>

    <table class="table table-bordered">
        <tr>
            
            <th>Titulo</th>
            
        </tr>
        @forelse ($offers as $offer)
        @if($offer-> deleted==0)
        <tr>
            
            <td>{{ $offer->title }} </td>
            <td>
                <a href="{{ route('pdf') }}">Generar PDF</a> 
            </td>

        </tr>
        @endif
        @empty
        <div class="alert alert-danger">
            {{ __("No hay noticias en este momento")}}
        </div> 
        @endforelse
        

    </table>
    <div class="card-footer mr-auto">
        {{$offers->links()}}
    </div>

   
    

    
@endsection