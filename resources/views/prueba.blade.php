<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$nombre}}</h1>
    <p>Probando Laravel en el ITST</p>
    <a href="{{route('ruta.users.create')}}">Crear usuario</a>
    <a href="{{route('ruta.users.show')}}">Ver Usuario</a>
    <a href="{{route('ruta.users.edit')}}">Editar Usuario</a>
    <a href="{{route('ruta.users.delete')}}">Eliminar Usuario</a>
</body>
</html>