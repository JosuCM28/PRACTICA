@extends ('layouts.app')
@section('content')
<div class="card mt-3">
  <div class="card-header">
    <h5>Productos</h5>
    <a href="{{route('productos.create')}}" class="btn btn-success">Agregar</a>

    <div>
      <a href="{{route('productos.pdf')}}" class="btn btn-secondary ml-auto">Descargar</a>
    </div>
  </div>
</div>
<div class="card-body"> 
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
  <div class="col-6">
      <div class="form-group">
          <a class="navbar-brand">Buscar</a>
          <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search" aria-label="Search"
          value="{{ (isset($_GET['search']))?$_GET['search']:'' }}">  </input>
      </div>
  </div>            
</div>
<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">precio</th>
      <th scope="col">Expiracion</th>
      <th scope="col">Stock</th>
    </tr>
  </thead>
  <tbody>
    @foreach($productos as $productos)
    <tr>
      <td>{{$productos->idProducto}}</td>
      <td>{{$productos->nombre}}</td>
      <td>{{$productos->descripcion}}</td>
      <td>{{$productos->precio}}</td>
      <td>{{$productos->expiracion}}</td>
      <td>{{$productos->stock}}</td>
      <td> <a href="{{route('productos.edit', $productos->idProducto)}}" class="btn btn-primary">Edit</a>
      <a href="{{route('productos.show', $productos->idProducto)}}" class="btn btn-info">Ver</a>
      <button type="submit" class="btn btn-danger" form="delete_{{$productos->idProducto}}" onclick="return confirm('¿Estás seguro de eliminar el registro?')">Eliminar</button>
      <form action="{{route('productos.destroy', $productos->idProducto)}}"
          id="delete_{{$productos->idProducto}}" method="post" enctype="multipart/form-data"
          hidden>
          @csrf
          @method('DELETE')
      </form>
</td>
    </tr>
    @endforeach
  </tbody>
</table>


</div>
<div class="card-footer">   </div>

</div>

@endsection