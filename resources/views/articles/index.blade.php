@extends('articles.layout') 
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
            <th>Id</th>
            <th>Titulo</th>
            <th>Imagenes</th>
            <th> Botones </th>
        </tr>
        @foreach ($articles as $article)
        <tr>
            <td>{{ $article->id  }}</td>
            <td>{{ $article->title }} </td>
            <td>{{ $article->image }}</td>
            <td>
                <form action=" " method="POST">
                    
                    @if ($article->actived==0)
                    <a class="btn btn-success-outline" href=" "><span class="fa fa-check"></a>
                        @else
                            <a class="btn btn-success" href=" "><i class="fa fa-pause-circle"></i></a>
                        @endif
                    
                        <a class="btn btn-primary" href=" "><i class="fa fa-pencil"></i></a>

                        @csrf
                        <button type="submit" class="btn btn-danger" ><span class="fa fa-remove"></span></button>
                    
                    </form>

                </td>

        </tr>
        @endforeach
    </table>
@endsection