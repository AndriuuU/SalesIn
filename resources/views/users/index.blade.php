@extends('users.layout') 
@section('content')
	<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">                
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href=""> Add users</a>
            </div> 
        </div>
    </div>
	<br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
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
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>
            @if ($user->type=="A")   
                Administrador
            @endif
            @if ($user->type=="U")   
                Usuario
            @endif  
            </td>
			<td>{{ $user->created_at }}</td>
            <td>{{ $user->email_verified_at }}</td>
            <td>
                <form action="" method="POST">   
                    @if ($user->actived==0)
                        <a class="btn btn-success-outline" href="/SalesIn/public/admin/{{ $user->id }}"><span class="fa fa-check"></a>
                    @endif

                    <a class="btn btn-primary" href=""><i class="fa fa-pencil"></i></a>  
                    @csrf

                    @method('DELETE')   
                    @if ($user->type=="U")   
                        <button type="submit" class="btn btn-danger"><span class="fa fa-remove"></span></button>
                    @endif 
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    
@endsection
