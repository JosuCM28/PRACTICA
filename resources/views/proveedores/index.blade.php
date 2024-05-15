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
                <div class="col-6">
                    <div class="form-group">
                        <a class="navbar-brand">Buscar</a>
                        <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search" aria-label="Search"
                        value="{{ (isset($_GET['search']))?$_GET['search']:'' }}">  
                    </div>
                </div>    
                @if($proveedores->total() > 10)
                {{$proveedores->links()}}
                @endif        
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
      <th scope="col">Acciones</th>
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
      <td> <a href="{{route('proveedores.edit', $proveedor->idProveedor)}}" class="btn btn-primary">Edit</a>
      <a href="{{route('proveedores.show', $proveedor->idProveedor)}}" class="btn btn-info">Ver</a>
      <button type="submit" class="btn btn-danger"
                                    form="delete_{{$proveedor->idProveedor}}"
                                    onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                    Eliminar
                                </button>
                                <form action="{{route('proveedores.destroy', $proveedor->idProveedor)}}"
                                    id="delete_{{$proveedor->idProveedor}}" method="post" enctype="multipart/form-data"
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
</div>
<div class"card-footer">   </div>
  @if($proveedores->total()> 10)
  {{proveedores->links()}}
  @endif
  </div>
</div>
@section('scripts')
    <!-- JS PARA FILTAR Y BUSCAR MEDIANTE PAGINADO -->
    <Script type="text/javascript">
$('#limit').on('change', function(){
    window.location.href="{{ route('proveedores.index')}}?limit=" + $(this).val()+ '&search=' + $('#search').val()
})

$('#search').on('keyup', function(e){
    if(e.keyCode == 13){
        window.location.href="{{ route('proveedores.index')}}?limit=" +$('#limit').val()+'&search='+$(this).val()
    }
})
</Script>
@endsection

@endsection