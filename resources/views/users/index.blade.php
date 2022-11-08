@extends('users.layout') 
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
    @if ($message = Session::get('messageError'))
        
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Usuarios</th>
            <th>Rol</th>
			<th>Created</th>
            <th>Verificado</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($users as $user)

        @if($user-> deleted==0)
            <tr>
                <td>{{ $user->id  }}</td>
                <td>{{ $user->name }} {{ $user->surname}}</td>
                <td>
                @if ($user->type=="A")  
                    <a><span class="fa fa-user-secret"></a> Administrador

                @endif
                @if ($user->type=="U")
                    <a><span class="fa fa-user"></a> Usuario
                 
                @endif  
                </td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->email_verified_at }}</td>
                <td>
                    @if ($user->type=="U")
                    <script> 
                        //Cuadro de diálogo de confirmación en JavaScript
                        function confirElimi()
                        {
                            return confirm("¿Seguro que deseas eliminar a este usuario?");
                        }
                    </script>

                    <form action="{{route('user.delete', [$user->id])}}" method="POST">
                       
                        @if ($user->actived==0)
                            <a class="btn btn-success-outline" href="{{route('user.valid', [$user->id])}}"><span class="fa fa-check"></a>
                        @else
                            <a class="btn btn-success" href="{{route('user.valid', [$user->id])}}"><i class="fa fa-pause-circle"></i></a>
                        @endif
                    
                        <a class="btn btn-primary" href=""><i class="fa fa-pencil"></i></a>

                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirElimi()"><span class="fa fa-remove"></span></button>
                    
                    </form>

                    @endif 
                </td>
            </tr>
            
        @endif
        @endforeach
        
    </table>  
    
@endsection
