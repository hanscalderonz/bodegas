@extends('layouts.app')
@section ('content')
    @if (auth::user()->tipo == 1)
        <div class="col-md-12">
            <div class="page-header">
                <a href="{{ route('usuarios.index') }}" class="btn btn-info" >Gestion de Usuarios</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="page-header">
                <a href="{{ route('productos.index') }}" class="btn btn-info" >Gestion de Productos</a>
            </div>
        </div>
    @elseif (auth::user()->tipo == 2)
        <div class="col-md-12">
            <div class="page-header">
                <a href="{{ route('usuarios.index') }}" class="btn btn-info" >Edicion de Usuarios</a>
            </div>
        </div>
        <div class="col-md-12">
            <div class="page-header">
                <a href="{{ route('productos.lista') }}" class="btn btn-info" >Realizar compra</a>
            </div>
        </div>
    @endif
@endsection