<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompletionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completions', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('id_request');
            $table->string('performed_by')->nullable();
            $table->string('po_number')->nullable();
            $table->string('report_number')->nullable();
            $table->date('completion_date')->nullable();
            $table->integer('bem_approved')->nullable();
            $table->string('bem_approved_by')->nullable();
            $table->date('bem_approved_at')->nullable();
            $table->integer('dept_approved')->nullable();
            $table->string('dept_approved_by')->nullable();
            $table->date('dept_approved_at')->nullable();
            $table->string('bem_email')->nullable();
            $table->string('dept_email')->nullable();

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
        Schema::dropIfExists('completions');
    }
}
