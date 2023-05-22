<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = ['marca','tipo','nombre','costo'];

    public function devices(){
        return $this->belongsTo(Device::class);
    }

    protected function nombre(): Attribute
    {
        return Attribute::make(
            // accesor
            get: fn (string $value) => ucfirst($value),

            //mutador
            set: fn (string $value) => ucfirst($value),
        );
    }
    protected function marca(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => ucfirst($value),
        );
    }
}
