<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userId',15);
            $table->string('hwId',10);
            $table->smallInteger('choice')->nullable();
            $table->boolean('practice')->default("0");
            $table->timestamps();
        });

        DB::table('submits')->insert([
            ['userId'=>'3A432100', 'hwId'=>'2', 'choice'=>9, 'practice'=>1],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submits');
    }
}
