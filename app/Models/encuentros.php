<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class encuentros extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'encuentros';
    protected $primaryKey = 'idencuentro';
    protected $keyType = 'integer';

    protected $fillable = ['name_encuentro', 'date_encuentro'];

    public function getAuthIdentifier()
    {
        return $this->id;
    } 

    public function registerOld()
    {
        return $this->belongsTo('App\encuentros', 'id', 'idencuentro');
    }
}
