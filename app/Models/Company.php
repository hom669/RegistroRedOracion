<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property integer $id
 * @property string $name
 * @property string $nit
 * @property integer $address
 * @property integer $delete
 * @property string $create_register
 * @property integer $create_update

 */
class Company extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'company';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';

    protected $fillable = ['name', 'nit','address','delete','create_register','create_update'];

    public function getAuthIdentifier()
    {
        return $this->id;
    } 
}
