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
            <th>Description</th>
            <th>Imagenes</th>
            <th> Botones </th>
        </tr>
        @forelse ($articles as $article)
        @if($article-> deleted==0)
        <tr>
            <td>{{ $article->id  }}</td>
            <td>{{ $article->title }} </td>
            <td>{{ $article->description }}</td>
            <td><img src="{{ asset('images/'.$article->image) }}" width=150px height=150px></td>
            <td>
                <form action="{{route('articles.delete', [$article->id])}}" method="POST">                                        
                    <a class="btn btn-primary" href="{{route('articles.edit', [$article->id])}}"><i class="fa fa-pencil"></i></a>
                    @csrf
                    <button type="submit" class="btn btn-danger" ><span class="fa fa-remove"></span></button>    
                </form>
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
        {{$articles->links()}}
    </div>

    <form action="{{route('articles.create')}}" method="GET">
        <button type="submit" class="btn btn-primary" ><span class="fa fa-add">ADD</span></button>
    </form>
    

    
@endsection