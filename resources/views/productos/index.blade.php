@extends('layouts.app')
@section('content')
<div class="col-md-12">
    <div class="page-header">
        <a href="{{ url('/home') }}" class="btn btn-info" ><span class="glyphicon glyphicon-home">&nbsp;Inicio</span></a>
        <a href="{{ route('productos.create') }}" class="btn btn-info" >Añadir Producto</a>
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
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
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
                        <a class="btn btn-primary btn-xs" href="{{action('ProductosController@edit', $producto->id)}}" >
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </td>
                    <td>
                        <form action="{{action('ProductosController@destroy', $producto->id)}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $productos->render() }}
</div>
@endsection