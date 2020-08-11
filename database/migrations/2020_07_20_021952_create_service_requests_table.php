<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            //$table->foreign('id_user')->references('id')->on('users');  
            $table->string('factory');
            $table->text('details');
            $table->text('purpose');
            $table->date('completion_date');
            $table->date('feasible_date')->nullable();
            $table->integer('is_approved')->nullable();
            $table->string('approved_by')->nullable();
            $table->date('approved_at')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('service_requests');
    }
}
