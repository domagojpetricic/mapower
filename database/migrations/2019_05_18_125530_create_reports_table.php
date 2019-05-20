<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('operator_id')->unsigned()->references('id')->on('operators');
            $table->string('name');
            $table->text('description');
            $table->boolean('status');
            $table->string('type')->default('marker');
            $table->float('latitude', 8, 6);
            $table->float('longitude', 8, 6);
            $table->json('coords');
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
        Schema::dropIfExists('report');
    }
}
