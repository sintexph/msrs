<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_request');
            $table->integer('with_quotation')->nullable();
            $table->string('contractor')->nullable();
            
            $table->integer('bem_approved')->nullable();
            $table->string('bem_approved_by')->nullable();
            $table->date('bem_approved_at')->nullable();

            $table->integer('factory_approved')->nullable();
            $table->string('factory_approved_by')->nullable();
            $table->date('factory_approved_at')->nullable();
            $table->integer('project_approved')->nullable();
            $table->string('project_approved_by')->nullable();
            $table->date('project_approved_at')->nullable();
            $table->integer('need_regional_approval')->nullable();
            $table->integer('regional_approved')->nullable();
            $table->string('regional_approved_by')->nullable();
            $table->date('regional_approved_at')->nullable();  

            // $table->string('bem_email')->nullable();

            $table->string('factory_email')->nullable();
            $table->string('project_email')->nullable();
            $table->string('regional_email')->nullable();
            
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
        Schema::dropIfExists('quotations');
    }
}
