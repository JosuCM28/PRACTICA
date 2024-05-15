@extends('layouts.app')

@section('content')
<div class='card mt-3'>
    <div class="card-header">
        <h5> Formulario para Editar proveedores</h5>
        <a href="{{route('productos.index')}}" class="btn btn-primary ml-auto">Volver</a>

    </div>
    <div class="card-body">
        <form action="{{route('productos.show', $productos->idProducto)}}" method="post" id="create">
        @include('productos.partials.form')

    </form>
        
    </div>
</div>

@endsection