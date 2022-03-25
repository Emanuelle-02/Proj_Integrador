<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('livros')->constrained()->onDelete('cascade');
            $table->date('data_emprestimo');
            $table->date('data_devolucao');
            $table->enum('status',['aprovado', 'renovado', 'aguardando','rejeitado', 'renovando', 'devolvendo', 'finalizado' ])->default('aguardando');
            
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimo');
    }
}
