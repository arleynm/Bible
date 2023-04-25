<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traducoes extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'abreviacao', 'idioma_id'];

    public function idioma()
    {
        return $this->belongsTo(Idioma::class);
    }

}
