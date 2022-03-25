<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $fillable = ['id_livro', 'id_user', 'status', 'data-emprestimo', 'data-devolucao'];

    protected $table = "emprestimo";
    
    public function user(){
        return $this-> belongsTo('app\models\User');
    }
}