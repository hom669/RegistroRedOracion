<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registerOld extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'register_olds';
    protected $primaryKey = 'idregisterold';
    protected $keyType = 'integer';

    protected $fillable = ['idmonitor', 'name_lastname','telephones','age','date_birthday','church','idplace','ministery','time_converted','idtipotiempo','franja','email'];

    public function getAuthIdentifier()
    {
        return $this->id;
    } 

    public function registerOld()
    {
        return $this->belongsTo('App\registerOld', 'id', 'idregisterold');
    }
}
