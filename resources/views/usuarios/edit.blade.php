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
        {{Session::get('success')}}
    @endif
    <div class="col-md-8">
        <form method="POST" action="{{ route('usuarios.update', $usuarios->id) }}" role="form">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <h2>Editar Usuarios</h2>
            <table class="table">
                <thead>
                    <th><h4>Nombres</h4></th>
                    <th><h4>Correo</h4></th>
                    <th><h4>Password</h4></th>
                    <th><h4>Edad</h4></th>
                    <th><h4>Tipo</h4></th>
                    <th><h4>Dinero</h4></th>
                </thead>
                <tbody>
                    <tr>
                        @if (auth::user()->tipo == 1)
                            <td><input type="text" name="nombres" id="nombres" class="form-control input-sm" value="{{$usuarios->nombres}}"></td>
                            <td><input type="text" name="email" id="email" class="form-control input-sm" value="{{$usuarios->email}}"></td>
                            <td><input type="password" name="password" id="password" class="form-control input-sm" value=""></td>
                            <td><input type="text" name="edad" id="edad" class="form-control input-sm" value="{{$usuarios->edad}}"></td>
                            <td>
                                <select name="tipo" id="tipo" class="form-control input-sm">
                                    <option value="1" {{($usuarios->tipo == 1)? 'selected="selected"' : ""}}>Administrador</option>
                                    <option value="2" {{($usuarios->tipo == 2)? 'selected="selected"' : ""}}>Usuario</option>
                                </select>
                            </td>
                            <td><input type="text" name="dinero" id="dinero" class="form-control input-sm" value="{{$usuarios->dinero}}"></td>
                        @elseif (auth::user()->tipo == 2)
                            <td><input type="text" name="nombres" id="nombres" class="form-control input-sm" value="{{$usuarios->nombres}}"></td>
                            <td><input type="text" disabled name="email" id="email" class="form-control input-sm" value="{{$usuarios->email}}"></td>
                            <td><input type="password" name="password" id="password" class="form-control input-sm"></td>
                            <td><input type="text" disabled name="edad" id="edad" class="form-control input-sm" value="{{$usuarios->edad}}"></td>
                            <td>
                                <select disabled name="tipo" id="tipo" class="form-control input-sm">
                                    <option value="1" {{($usuarios->tipo == 1)? 'selected="selected"' : ""}}>Administrador</option>
                                    <option value="2" {{($usuarios->tipo == 2)? 'selected="selected"' : ""}}>Usuario</option>
                                </select>
                            </td>
                            <td><input disabled type="text" name="dinero" id="dinero" class="form-control input-sm" value="{{$usuarios->dinero}}"></td>
                        @endif
                    </tr>
                    <tr>
                        <td><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-refresh">Actualizar</span></button></td>
                        <td><a href="{{ route('usuarios.index') }}" class="btn btn-info" ><span class="glyphicon glyphicon-share-alt">Atras</span></a></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection