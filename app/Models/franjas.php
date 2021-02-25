<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class franjas extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'franjas';
    protected $primaryKey = 'idfranja';
    protected $keyType = 'integer';

    protected $fillable = ['desc_franja'];

    public function getAuthIdentifier()
    {
        return $this->id;
    } 

    public function franjas()
    {
        return $this->belongsTo('App\franjas', 'id', 'idfranja');
    }
}
