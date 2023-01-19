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
            <th>descripcion</th>
            <th>Fecha maxima</th>
            <th>Cantidad</th>
            <th>ciclo</th>

        </tr>

        <tr>
        @foreach ($cicles as $cicle)
        @if ($cicle->id == $offers->cicle_id)
            <td>
                @if($cicle->img !="")
                    <img src="{{ asset('images/cicles/'.$cicle->img) }}" width=70px height=70px>
                @else
                    <img src="{{ asset('images/no-img.jpg' )}}" width=70px height=70px>
                @endif
            </td>
        
            <td>{{ $offers->title }} </td>
            <td>{{$offers->description}}</td>
            <td>{{$offers->date_max}}</td>
            <td>{{$offers->num_candidates}}</td>
            <td>{{$cicle->name}}</td>

        @endif
        @endforeach
        </tr>
        
        

    </table>
   
    <div>
    <a class="btn btn-danger-outline" href="{{route('offers.index')}}"><span class="fa fa-arrow-left"> Return</a>

    </div>
   
    

    
@endsection