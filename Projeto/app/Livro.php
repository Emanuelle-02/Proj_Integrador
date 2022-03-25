<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = [
        'titulo', 'autor', 'genero', 'descricao', 'isbn', 'disponibilidade', 'paginas'
    ];
}
