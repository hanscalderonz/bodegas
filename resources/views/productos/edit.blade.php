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
        <form method="POST" action="{{ route('productos.update', $productos->id) }}" role="form">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <h2>Gestion producto</h2>
            <table class="table">
                <thead>
                    <th><h4>Nombre</h4></th>
                    <th><h4>Codigo</h4></th>
                    <th><h4>Precio de la caja</h4></th>
                    <th><h4>Restriccion de edad</h4></th>
                    <th><h4>Cajas en bodega</h4></th>
                    <th><h4>Cantidad</h4></th>
                    <th><h4>Sacar cajas</h4></th>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="nombre_producto" id="nombre_producto" class="form-control input-sm" value="{{$productos->nombre_producto}}"></td>
                        <td><input type="text" disabled name="codigo_producto" id="codigo_producto" class="form-control input-sm" value="{{$productos->codigo_producto}}"></td>
                        <td><input type="text" name="precio_caja" id="precio_caja" class="form-control input-sm" value="{{$productos->precio_caja}}"></td>
                        <td><input type="text" name="restriccion_edad" id="restriccion_edad" class="form-control input-sm" value="{{$productos->restriccion_edad}}"></td>
                        <td><input type="text" disabled name="cajas" id="cajas" class="form-control input-sm" value="{{$productos->numero_cajas}}"></td>
                        <td><input type="number" name="numero_cajas" id="numero_cajas" class="form-control input-sm" min="0" value="{{$productos->numero_cajas}}"></td>
                        <td><input type="checkbox" name="sacar_cajas" id="sacar_cajas" class="form-control input-sm"></td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-refresh">Actualizar</span></button></td>
                        <td><a href="{{ route('productos.index') }}" class="btn btn-info" ><span class="glyphicon glyphicon-share-alt">Atras</span></a></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection