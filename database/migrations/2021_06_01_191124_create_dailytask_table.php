<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailytaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailytask', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('user');
            $table->string('name');
            $table->string('description')->nullable();
            $table->time('time', $precision = 0);
            $table->string('group')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dailytask');
    }
}
