<?php
use App\Applied;
use App\offers;
use Illuminate\Support\Facades\Auth;
?>

<style>
    p {
        margin-right: 80px;
    }
</style>

<img src="{{ asset('images/cicles/'.$cicle->img) }}" width=50px height=50px> 

<p style="margin-left: 500px"> Nombre: <?php echo Auth::user()->name; ?> </p> 
<p style="margin-left: 500px"> Apellido: <?php echo Auth::user()->surname; ?></p> 

<?php 
    $applieds = Applied::where('user_id', Auth::user()->id)->get();
    $offers = Offers::join('applieds','offers.id','=','applieds.offer_id')->where('applieds.user_id', Auth::user()->id)->get();
?>

<h1>Ofertas aplicadas</h1>
<table>
    <tr>
        <td>Título</td> 
        <td>Descripción</td> 
    </tr>
    @foreach($offers as $offers)
    <tr>
        <td>{{ $offer->title }}</td> 
        <td>{{ $offer->description }}</td> 
    </tr>
    @endforeach
</table>


<!--bucle por la tabla 'applieds', 
    mira primero todas las ofertas con user id = user id del loggeado 
    y luego coge los offer id (tb de la tabla 'applieds') y mira ese id en la tabla 'offers' y coge el titulo y descripcion de cada una 
    y los vuelca aqui delante->

