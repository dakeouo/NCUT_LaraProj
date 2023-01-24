<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeworks', function (Blueprint $table) {
            $table->string('type',15);
            $table->smallInteger('id')->primary();
            $table->mediumText('contect');
            $table->smallInteger('weight');
            $table->dateTime('start_at');
            $table->dateTime('finish_at');
        });

        DB::table('homeworks')->insert([
            [
                'type'=>'0', 'id'=>1, 
                'contect'=>'<div>繳交時間：10/2(四)10:00 – 10/10(二)17:00</div><ul><li>選擇題答案請打在WORD檔裡</li><li>網頁請用資料夾包起來</li><li>製作自我介紹的頁面(至少兩頁)</li></ul><div>完成後以自己的學號為檔名打包上傳</div>',
                'weight'=>100, 'start_at'=>'2018-10-02 13:00:00', 'finish_at'=>'2018-10-10 22:00:00',
            ],
            [
                'type'=>'0', 'id'=>2, 
                'contect'=>'無說明',
                'weight'=>100, 'start_at'=>'2018-10-18 08:00:00', 'finish_at'=>'2099-01-01 00:00:00',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homeworks');
    }
}
