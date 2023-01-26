@extends('offers.layout') 
@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">                
            </div>
        </div>
    </div>
    <a href="{{ route('pdf') }}">Abrir PDF en el navegador.</a> 
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
        @if ($cicle->id == $offer->cicle_id)
            <td>
                @if($cicle->img !="")
                    <img src="{{ asset('images/cicles/'.$cicle->img) }}" width=70px height=70px>
                @else
                    <img src="{{ asset('images/no-img.jpg' )}}" width=70px height=70px>
                @endif
            </td>
        @endif
        @endforeach
            <td>{{ $offer->title }} </td>
           
            <td>
                <div>
                <a class="btn btn-success-outline" href="{{route('offers.apli', [$offer->id])}}"><span class="fa fa-check"></a>
</div>
                <a class="btn btn-info-outline" href="{{route('offers.show', [$offer->id])}}"><span class="fa fa-check">Show</a>
                
                 
            </td>

        </tr>
       
        @empty

        <div class="alert alert-danger">
            {{ __("No hay ofertas en este momento")}}
        </div> 
        
        @endforelse
        

    </table>
   
    

   
    

    
@endsection