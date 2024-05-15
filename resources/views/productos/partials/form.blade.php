@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="razonSocial">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{(isset($productos))?$productos->nombre:old('nombre')}}" required>
        </div></div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" value="{{(isset($productos))?$productos->descripcion:old('descripcion')}}" required>
        </div></div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Precio</label>
            <input type="text" class="form-control" name="precio" value="{{(isset($productos))?$productos->precio:old('precio')}}" required>
        </div></div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Expiracion</label>
            <input type="text" class="form-control" name="expiracion" value="{{(isset($productos))?$productos->expiracion:old('expiracion')}}" required>
        </div></div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Stock</label>
            <input type="text" class="form-control" name="stock" value="{{(isset($productos))?$productos->stock:old('stock')}}" required>
        </div></div>

</div>