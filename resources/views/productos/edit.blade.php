@extends('layouts.app')

@section('content')
<div class='card mt-3'>
    <div class="card-header">
        <h5> Formulario para Editar Productos</h5>
        <a href="{{route('productos.index')}}" class="btn btn-primary ml-auto">Volver</a>

    </div>
    <div class="card-body">
        <form action="{{route('productos.update', $productos->idProducto)}}" method="post" id="create">
        @method('PUT')
        @include('productos.partials.form')

    </form>
        
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" form="create">Editar</button>

    </div>

</div>

@endsection