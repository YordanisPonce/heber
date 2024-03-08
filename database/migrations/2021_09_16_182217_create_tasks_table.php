<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('id_degree');
            $table->string('operation');
            $table->integer('pages');
            $table->integer('figure_1')->nullable();
            $table->integer('figure_2')->nullable();
            $table->integer('figure_3')->nullable();
            $table->integer('figure_4')->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('tasks');
    }
}
