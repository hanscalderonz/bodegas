@extends('layouts.app')
@section('content')
    @if (count($errors) > 0)
        <strong>Error!</strong>
        Revise los campos obligatorios.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if(Session::has('success'))
        {{ Session::get('success') }}
    @endif
    <div class="col-md-8">
        <h2>Nuevo Usuario</h2>
        <table class="table">
            <thead>
                <th><h4>Nombres</h4></th>
                <th><h4>Correo</h4></th>
                <th><h4>Password</h4></th>
                <th><h4>Edad</h4></th>
                <th><h4>Tipo</h4></th>
                <th><h4>Dinero</h4></th>
            </thead>
            <form method="POST" action="{{ route('usuarios.store') }}" role="form">
                {{ csrf_field() }}
                <tbody>
                    <tr>
                        <td><input type="text" name="nombres" id="nombres" class="form-control input-sm" placeholder="Nombres del usuario"></td>
                        <td><input type="text" name="email" id="email" class="form-control input-sm" placeholder="Correo del usuario"></td>
                        <td><input type="password" name="password" id="password" class="form-control input-sm" placeholder="Digite el password"></td>
                        <td><input type="text" name="edad" id="edad" class="form-control input-sm" placeholder="Edad del usuario"></td>
                        <td>
                            <select name="tipo" id="tipo" class="form-control input-sm" placeholder="Tipo de usuario">
                                <option value="1">Administrador</option>
                                <option value="2">Usuario</option>
                            </select>
                        </td>
                        <td><input type="text" name="dinero" id="dinero" class="form-control input-sm" placeholder="Dinero del usuario"></td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"> Guardar</span></button></td>
                        <td><a href="{{ route('usuarios.index') }}" class="btn btn-info" ><span class="glyphicon glyphicon-share-alt"> Atras</span></a></td>
                        <td></td>
                    </tr>
                </tbody>
            </form>
        </table>
    </div>
@endsection