@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar noticia') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('articles.update', [$article->id])}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$article->title}}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$article->description}}" required autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cicle_id" class="col-md-4 col-form-label text-md-right">{{ __('Cicle') }}</label>

                            <div class="col-md-6">

                                <select name="cicle_id" class="form-control @error('email') is-invalid @enderror" name="cicle_id" value="{{ old('cicle_id') }}">>
                                    @foreach($cicles as $cicle)
                                    @if($cicle->id==$article->cicle_id)
                                        <option value="{{ $cicle->id }}">{{ $cicle->name }}</option>
                                    @endif
                                    @endforeach
                                    @foreach($cicles as $cicle)
                                        <option value="{{ $cicle->id }}">{{ $cicle->name }}</option>
                                        
                                    @endforeach
                                </select>

                                @error('cicle_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                            <div class="col-md-6">
                                <label for="image">Elige una imagen para la noticia:</label>
                                <img src="{{ asset('images/'.$article->image) }}" width=150px height=150px>
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/png, image/jpeg">
                                
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar noticia') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection