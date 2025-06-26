<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialUnidad extends Model
{
    protected $fillable = ['cantidad', 'idUnidad', 'idMaterial'];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'idUnidad', 'id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'idMaterial', 'codigo');
    }
}
