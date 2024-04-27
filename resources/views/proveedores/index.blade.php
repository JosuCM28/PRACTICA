@extends ('layouts.app')
@section('content')
<div class="card mt-3">
<div class"card-header">
<h5>Proveedores</h5><a href="{{route('proveedores.create')}}" class="btn btn-success">Agregar</a>
</div>
<div class"card-body"> 
<div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <a class="navbar-brand">Listar</a>
                        <select class="custom-select" id="limit" name="limit">
                            @foreach([10,20,50,100] as $limit)
                            <option value="{{$limit}}" @if(isset($_GET['limit']))
                                {{($_GET['limit']==$limit)?'selected': ''}}@endif>{{$limit}}</option>
                            @endforeach
                        </select>      
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <a class="navbar-brand">Buscar</a>
                        <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search" aria-label="Search"
                        value="{{ (isset($_GET['search']))?$_GET['search']:'' }}">  
                    </div>
                </div>            
            </div>
<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Razon</th>
      <th scope="col">Nombre</th>
      <th scope="col">Direccion</th>
      <th scope="col">NO.Telefono</th>
      <th scope="col">Correo</th>
      <th scope="col">RFC</th>
    </tr>
  </thead>
  <tbody>
    @foreach($proveedores as $proveedor)
    <tr>
      <td>{{$proveedor->idProveedor}}</td>
      <td>{{$proveedor->razonSocial}}</td>
      <td>{{$proveedor->nombreCompleto}}</td>
      <td>{{$proveedor->direccion}}</td>
      <td>{{$proveedor->telefono}}</td>
      <td>{{$proveedor->correo}}</td>
      <td>{{$proveedor->rfc}}</td>
    </tr>
    @endforeach
  </tbody>
</table>


</div>
<div class"card-footer">   </div>

</div>

@endsection