<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class device extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $table = 'devices';

    public function users(){
        return $this->belongsToMany(User::class)->withPivot(['date']);
    }
    protected $fillable = ['lugar','espacio','device','producto_id'];

    public function productos(){
        return $this->belongsTo(Producto::class);
    }
    public function archivo(){
        return $this->hasOne(Archivo::class);
    }
}
