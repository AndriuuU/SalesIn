<style>
    p {
        margin-right: 80px;
    }
</style>

<img src="{{ asset('images/cicles/'.$cicle->img) }}" width=50px height=50px>

<p style="margin-left: 500px"> Nombre: {{$user->name}}</p> 
<p style="margin-left: 500px"> Apellido: {{$user->surname}}</p> 



<table>
    <tr>
        <td>{{ $offer->title }} </td>
        <td>{{ $offer->description }} </td>
    </tr>
</table>