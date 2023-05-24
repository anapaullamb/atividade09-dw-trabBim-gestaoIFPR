<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessoresDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professores_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professor');
            $table->unsignedBigInteger('disciplina');
            $table->foreign('professor')->references('id')->on('professores');
            $table->foreign('disciplina')->references('id')->on('disciplinas');
            $table->softDeletes();
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
        Schema::dropIfExists('professores_disciplinas');
    }
}
