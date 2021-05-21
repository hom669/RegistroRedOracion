<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ciudades extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'ciudades';
    protected $primaryKey = 'id_ciudad';
    protected $keyType = 'integer';

    protected $fillable = ['cod_ciudad', 'name_ciudad'];

    public function getAuthIdentifier()
    {
        return $this->id;
    } 

    public function departamentos()
    {
        return $this->belongsTo('App\ciudades', 'id', 'id_ciudad');
    }
}
