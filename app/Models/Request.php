<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $identificacion
 * @property integer $valuerequest
 * @property integer $age
 * @property string $address
 * @property integer $idcompany

 */

class Request extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'request';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';

    protected $fillable = ['name', 'identificacion','valuerequest','age','address','idcompany'];

    public function getAuthIdentifier()
    {
        return $this->id;
    } 

    public function companys()
    {
        return $this->belongsTo('App\Companys', 'id', 'idcompany');
    }
}
