@extends('layouts.app')
@section('content')
<div class="col-md-12">
    <div class="page-header">
        <a href="{{ url('home') }}" class="btn btn-info" ><span class="glyphicon glyphicon-home">&nbsp;Inicio</span></a>
    </div>
</div>
<div class="col-md-8">
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">codigo</th>
            <th scope="col">Cajas en bodega</th>
            <th scope="col">Precio de la caja</th>
            <th scope="col">Restriccion de edad</th>
            <th scope="col">Comprar</th>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre_producto }}</td>
                    <td>{{ $producto->codigo_producto }}</td>
                    <td>{{ $producto->numero_cajas }}</td>
                    <td>{{ $producto->precio_caja }}</td>
                    <td>{{ $producto->restriccion_edad }}</td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{action('ProductosController@compras', $producto->id)}}" >
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $productos->render() }}
</div>
@endsection