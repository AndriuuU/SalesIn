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
            <th>Imagenes</th>
            <th>Titulo</th>
            <th>Funciones</th>
            
        </tr>
        @forelse ($offers as $offer)
        
        @foreach ($cicles as $cicle)
        @if($cicle-> deleted==0 && $offer->deleted==0)
        @if($cicle-> id==$offer-> cicle_id)
        <tr>

            <td>                    
                <img src="{{ asset('images/cicles/'.$cicle->img) }}" width=50px height=50px>
            </td>
        
            <td>{{ $offer->title }} </td>
            <td>
                @if ($offer->actived==0)
                    <a class="btn btn-success-outline" href=""><span class="fa fa-check"></a>
                @else
                    <a class="btn btn-success" href=""><i class="fa fa-pause-circle"></i></a>
                @endif
            </td>

            </tr>
        @endif
        @endif
        @endforeach
       
        
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