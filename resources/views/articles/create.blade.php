@extends('articles.layout') 
@section('content')
    <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">                
            </div>
        </div>
    </div>

    <form action="{{route('articles.add')}}" method="POST">
        @csrf
        @METHOD("POST")
        <div class="form-group row">
            <label for="inputtitle" class="col-sm-2 col-form-label text-md-right">Title</label>
            <div class="col-sm-10">
            <input name="title" type="text" class="form-control" id="inputtitle" placeholder="Title article">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="inputDescription" class="col-sm-2 col-form-label text-md-right">Description</label>
            <div class="col-sm-10">
            <input name="description" type="text" class="form-control" id="inputDescription" placeholder="Description the article">
            </div>
        </div>

        <div class="form-group row">
            <label for="cicle_id" class="col-sm-2 col-form-label text-md-right">{{ __('Cicle') }}</label>

            <div class="col-md-6">

                <select name="cicle_id" class="form-control @error('email') is-invalid @enderror" name="cicle_id" value="{{ old('cicle_id') }}">>
                    <option value="">Select Cicle</option>
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

            <label for="image" class="col-sm-2 col-form-label text-md-right">File:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="image" wire:model="image">

            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        </div>
        </br>
        <div class="col-sm-2 col-form-label text-md-right">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </div>
    </form>
    
@endsection