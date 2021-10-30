@extends('layouts.app')
@section('content')
<div class="col-md-12">
    <div class="page-header">
        <a href="{{ url('/home') }}" class="btn btn-info" ><span class="glyphicon glyphicon-home">&nbsp;Inicio</span></a>
        @if (auth::user()->tipo == 1)
        <a href="{{ route('usuarios.create') }}" class="btn btn-info" >Añadir Usuario</a>
        @endif
    </div>
</div>
<div class="col-md-8">
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <th scope="col">ID</th>
            <th scope="col">Nombres</th>
            <th scope="col">Correo</th>
            <th scope="col">Edad</th>
            <th scope="col">Tipo</th>
            <th scope="col">Dinero</th>
            <th scope="col">Editar</th>
            @if (auth::user()->tipo == 1)
                <th scope="col">Eliminar</th>
            @endif
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nombres }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->edad }}</td>
                    <td>{{ ($usuario->tipo == 1)? 'Administrador' : 'Usuario' }}</td>
                    <td>{{ $usuario->dinero }}</td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{action('UsuariosController@edit', $usuario->id)}}" >
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </td>
                    @if (auth::user()->tipo == 1)
                    <td>
                        <form action="{{action('UsuariosController@destroy', $usuario->id)}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $usuarios->render() }}
</div>
@endsection