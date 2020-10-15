<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration
{
    /**
     * マイグレーション実行.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('to');
            $table->timestamps();
        });
    }

    /**
     * マイグレーション巻き戻し.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
