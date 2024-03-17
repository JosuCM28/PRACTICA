<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCliente';
    protected $table = 'clientes';
    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'rfc',
        'telefono',
        'correo',
        'direccion',
        'idProducto'];
}
