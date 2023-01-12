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
    @if ($message = Session::get('message'))
       
       <div class="alert alert-success">
           <p>{{ $message }}</p>
       </div>
   @endif
   <br>
    <table class="table table-bordered">
        <tr>
            <th>Imagenes</th>
            <th>Titulo</th>
            <th>Funciones</th>

            
        </tr>
        
        @forelse ($offers as $offer)
        
        <tr>
        @foreach ($cicles as $cicle)
        @if ($offer->cicle_id == $cicle->id)
            <td>
                @if($cicle->img !="")
                    <img src="{{ asset('images/cicles/'.$cicle->img) }}" width=50px height=50px>
                @else
                    no hay imagen
                @endif
            </td>
        @endif
        @endforeach
            <td>{{ $offer->title }} </td>
           
            <td>
                
                <a class="btn btn-success-outline" href="{{route('offers.apli', [$offer->id])}}"><span class="fa fa-check"></a>
                
                 
            </td>

        </tr>
       
        @empty

        <div class="alert alert-danger">
            {{ __("No hay ofertas en este momento")}}
        </div> 
        
        @endforelse
        

    </table>
   

   
    

    
@endsection