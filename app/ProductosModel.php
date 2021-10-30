<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosModel extends Model
{
    protected $table = "productos";
    protected $fillable = ['nombre_producto', 'codigo_producto', 'numero_cajas', 'precio_caja', 'restriccion_edad'];
    
    //Scope
    public function scopeSearch($query, $nombre) {
        if($nombre)
            return $query->where('nombre', 'LIKE', "%$nombre%");
    }
}
