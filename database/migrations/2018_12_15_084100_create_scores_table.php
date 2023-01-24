<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userId',15);
            $table->string('hwId',10);
            $table->smallInteger('hwScore');
            $table->mediumText('hwComment')->nullable();
        });

        DB::table('scores')->insert([
            ['userId'=>'3A617006', 'hwId'=>'1', 'hwScore'=>90, 'hwComment'=>NULL],
            ['userId'=>'3A617007', 'hwId'=>'1', 'hwScore'=>87, 'hwComment'=>NULL],
            ['userId'=>'3A617008', 'hwId'=>'1', 'hwScore'=>69, 'hwComment'=>NULL],
            ['userId'=>'3A617009', 'hwId'=>'1', 'hwScore'=>78, 'hwComment'=>NULL],
            ['userId'=>'3A617010', 'hwId'=>'1', 'hwScore'=>92, 'hwComment'=>NULL],
            ['userId'=>'3A432100', 'hwId'=>'1', 'hwScore'=>85, 'hwComment'=>NULL],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
