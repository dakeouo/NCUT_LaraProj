<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choices', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('chapter');
            $table->smallInteger('topic');
            $table->smallInteger('ans');
            $table->string('question');
            $table->string('option1');
            $table->string('option2');
            $table->string('option3');
            $table->string('option4');
        });

        DB::table('choices')->insert([
            [
                'chapter'=>1, 'topic'=>1, 'ans'=>3,
                'question'=>'下列何者是構成網頁的基本要素?',
                'option1'=>'PHP', 'option2'=>'JSP', 'option3'=>'HTML', 'option4'=>'ASP' 
            ],
            [
                'chapter'=>1, 'topic'=>1, 'ans'=>4,
                'question'=>'網頁是由許多標籤所組成，一個簡單的網頁包含以下那些標籤?',
                'option1'=>'&lt;HTML&gt;', 'option2'=>'&lt;META&gt;', 
                'option3'=>'&lt;BODY&gt;', 'option4'=>'以上皆是' 
            ],
            [
                'chapter'=>1, 'topic'=>1, 'ans'=>4,
                'question'=>'下列何者是宣告網頁的開始與結束?',
                'option1'=>'&lt;HEAD&gt;&lt;/HEAD&gt;', 'option2'=>'&lt;BODY&gt;&lt;/BODY&gt;', 
                'option3'=>'&lt;FORM&gt;&lt;/FORM&gt;', 'option4'=>'&lt;HTML&gt;&lt;/HTML&gt;' 
            ],
            [
                'chapter'=>1, 'topic'=>1, 'ans'=>3,
                'question'=>'網頁檔名之命名，下列何者正確?',
                'option1'=>'建議使用中文和數字組合即可當作檔案名稱', 
                'option2'=>'建議使用中文和英文組合即可當作檔案名稱', 
                'option3'=>'建議使用英文即可當作檔案名稱', 'option4'=>'以上皆是' 
            ],
            [
                'chapter'=>1, 'topic'=>1, 'ans'=>3,
                'question'=>'有關於 PHP 程式的開始與結束，下列何者錯誤?',
                'option1'=>'&lt;echo \"第一個 PHP 程式\"; &gt;', 
                'option2'=>'&lt;?echo \"第一個 PHP 程式\"; ?&gt;', 
                'option3'=>'&lt;?PHP echo \"第一個 PHP 程式\"; ?&gt;', 
                'option4'=>'以上皆錯誤' 
            ],
            [
                'chapter'=>2, 'topic'=>1, 'ans'=>2,
                'question'=>'下列何者為「拖曳字元」 ?',
                'option1'=>'\"\\\\\"', 'option2'=>'\"\\\"', 'option3'=>'\"%\"', 'option4'=>'\"&\"' 
            ],
            [
                'chapter'=>2, 'topic'=>1, 'ans'=>2,
                'question'=>'有關於變數 ，下列何者正確 ?',
                'option1'=>'變數名稱無大小寫差異', 'option2'=>'變數名稱可以是英文 、 數字 、 底線組成', 
                'option3'=>'變數名稱可以是數字開頭', 'option4'=>'變數使用 \" &gt; \" 大於符號表示變數內容' 
            ],
            [
                'chapter'=>2, 'topic'=>1, 'ans'=>4,
                'question'=>'PHP 的特點是什麼 ?',
                'option1'=>'是伺服器端程式語言', 'option2'=>'是內嵌式的程式語言', 
                'option3'=>'具有跨平台的能力', 'option4'=>'以上皆是' 
            ],
            [
                'chapter'=>2, 'topic'=>1, 'ans'=>1,
                'question'=>'在 PHP 中我們如何定義變數 ?',
                'option1'=>'在變數名稱 前 加上 \" $ \" 符號', 'option2'=>'在變數名稱前加上 \" % \" 符號', 
                'option3'=>'在變數名稱前加上 \" & \" 符號', 'option4'=>'在變數名稱前加上 \" # \" 符號' 
            ],
            [
                'chapter'=>2, 'topic'=>1, 'ans'=>2,
                'question'=>'PHP 程式、網頁需放於何處才能執行 ?',
                'option1'=>'直接開啟檔案即可執行', 
                'option2'=>'若無更改安裝路徑， 網頁存放於 C:/AppServ/www 資料夾內即可執行', 
                'option3'=>'若無更改安裝路徑，網頁存放於 C:/AppServ 資料夾內即可執行', 
                'option4'=>'以上皆可執行 PHP 程式' 
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
        Schema::dropIfExists('choices');
    }
}
