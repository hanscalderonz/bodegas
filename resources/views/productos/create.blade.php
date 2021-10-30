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
        <h2>Nuevo Producto</h2>
        <table class="table">
            <thead>
                <th><h4>Nombre</h4></th>
                <th><h4>Codigo</h4></th>
                <th><h4>Numero de cajas en bodega</h4></th>
                <th><h4>Precio por caja</h4></th>
                <th><h4>Restriccion de edad</h4></th>
            </thead>
            <form method="POST" action="{{ route('productos.store') }}" role="form">
                {{ csrf_field() }}
                <tbody>
                    <tr>
                        <td><input type="text" name="nombre_producto" id="nombre_producto" class="form-control input-sm" placeholder="Nombre del producto"></td>
                        <td><input type="text" name="codigo_producto" id="codigo_producto" class="form-control input-sm" placeholder="Codigo del producto"></td>
                        <td><input type="text" name="numero_cajas" id="numero_cajas" class="form-control input-sm" placeholder="Cajas en bodega"></td>
                        <td><input type="text" name="precio_caja" id="precio_caja" class="form-control input-sm" placeholder="Precio de la caja"></td>
                        <td><input type="text" name="restriccion_edad" id="restriccion_edad" class="form-control input-sm" placeholder="Restriccion de edad"></td>
                    </tr>
                    <tr>
                        <td><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"> Guardar</span></button></td>
                        <td><a href="{{ route('productos.index') }}" class="btn btn-info" ><span class="glyphicon glyphicon-share-alt"> Atras</span></a></td>
                        <td></td>
                    </tr>
                </tbody>
            </form>
        </table>
    </div>
@endsection