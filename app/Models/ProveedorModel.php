<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProveedorModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'idProveedor';
    protected $table = 'proveedores';
    protected $fillable = [
        'razonSocial',
        'nombreCompleto',
        'direccion',
        'telefono',
        'correo',
        'rfc'
    ];
    public function productos()
    {
        return $this->hasMany(ProductoModel::class, 'idProveedor', 'idProveedor');
    }
}
