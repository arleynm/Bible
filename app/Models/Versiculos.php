<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versiculos extends Model
{
    use HasFactory;
    protected $fillable = ['capitulo', 'versiculo', 'texto', 'livro_id'];


    public function livros()
    {
        return $this->hasMany(Livro::class);
    }

}
