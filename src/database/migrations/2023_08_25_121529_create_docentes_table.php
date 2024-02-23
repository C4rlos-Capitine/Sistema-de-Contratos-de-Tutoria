<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id('id_docente');
            $table->string('nome_docente');
            $table->string('apelido_docente');
            $table->string('nacionalidade');
            $table->string('bi');
            $table->string('nuit');
            $table->integer('id_nivel');
            $table->integer('id_curso_in_docente');
            $table->integer('id_user')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreign('id_nivel')->references('id_nivel')->on('nivels')->onDelete('cascade');
           // $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_curso_in_docente')->references('id_curso')->on('cursos')->onDelete('cascade');
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
        Schema::dropIfExists('docentes');
    }
};
