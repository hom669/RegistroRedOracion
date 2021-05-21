<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoTiempo extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'tipo_tiempos';
    protected $primaryKey = 'idtipotiempo';
    protected $keyType = 'integer';

    protected $fillable = ['name_tipotiempo'];

    public function getAuthIdentifier()
    {
        return $this->id;
    } 

    public function tipoTiempo()
    {
        return $this->belongsTo('App\tipoTiempo', 'id', 'idtipotiempo');
    }
}
