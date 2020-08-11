<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_request');
            $table->integer('is_electrical')->nullable();
            $table->integer('is_mechanical')->nullable();
            $table->integer('is_civil')->nullable();
            $table->integer('is_others')->nullable();
            $table->integer('is_layout')->nullable();
            $table->integer('is_technical')->nullable();
            $table->integer('is_photograph')->nullable();
            $table->integer('is_drawing')->nullable();
            $table->integer('is_inhouse');
            $table->integer('is_approved')->nullable();
            $table->integer('approved_by')->nullable();
            $table->integer('approved_at')->nullable();
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
        Schema::dropIfExists('evaluations');
    }
}
