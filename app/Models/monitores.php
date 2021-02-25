<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monitores extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'monitores';
    protected $primaryKey = 'idmonitor';
    protected $keyType = 'integer';

    protected $fillable = ['name_monitor'];

    public function getAuthIdentifier()
    {
        return $this->id;
    } 

    public function monitores()
    {
        return $this->belongsTo('App\departamentos', 'id', 'id_departamento');
    }
}
