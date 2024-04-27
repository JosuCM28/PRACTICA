@extends('layouts.app')

@section('content')
<div class='card mt-3'>
    <div class="card-header">
        <h5> Formulario para agregar proveedores</h5>
        <a href="{{route('proveedores.index')}}" class="btn btn-primary ml-auto">Volver</a>

    </div>
    <div class="card-body">
        <form action="{{route('proveedores.store')}}" method="post" id="create">
        @include('proveedores.partials.form')
    </form>
        
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" form="create">Crear</button>

    </div>

</div>

@endsection