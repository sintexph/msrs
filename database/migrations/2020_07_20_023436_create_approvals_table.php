<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_request');
            $table->integer('with_material')->nullable();
            $table->integer('with_estimate')->nullable();
            $table->integer('with_design')->nullable();
            $table->integer('with_permit')->nullable();
            $table->integer('with_schedule')->nullable();
            $table->string('other')->nullable();
            $table->integer('bem_approved')->nullable();
            $table->string('bem_approved_by');
            $table->date('bem_approved_at')->nullable();
            $table->integer('ehss_approved')->nullable();
            $table->string('ehss_approved_by');
            $table->date('ehss_approved_at')->nullable();
            $table->integer('dept_approved')->nullable();
            $table->string('dept_approved_by');
            $table->date('dept_approved_at')->nullable();
            $table->integer('factory_approved')->nullable();
            $table->string('factory_approved_by');
            $table->date('factory_approved_at')->nullable();
            $table->integer('project_approved')->nullable();
            $table->string('project_approved_by')->nullable();
            $table->date('project_approved_at')->nullable();
            $table->integer('outsource_received')->nullable();
            $table->integer('outsource_received_by')->nullable();
            $table->integer('outsource_received_at')->nullable();

            $table->string('bem_email')->nullable();
            $table->string('ehss_email')->nullable();
            $table->string('dept_email')->nullable();
            $table->string('factory_email')->nullable();
            $table->string('project_email')->nullable();

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
        Schema::dropIfExists('approvals');
    }
}
