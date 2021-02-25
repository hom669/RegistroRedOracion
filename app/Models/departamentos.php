<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamentos extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'departamentos';
    protected $primaryKey = 'id_departamento';
    protected $keyType = 'integer';

    protected $fillable = ['cod_departamento', 'name_departamento'];

    public function getAuthIdentifier()
    {
        return $this->id;
    } 

    public function departamentos()
    {
        return $this->belongsTo('App\departamentos', 'id', 'id_departamento');
    }
}
