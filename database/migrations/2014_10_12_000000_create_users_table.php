<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid',15)->unique();
            $table->string('type',20)->default("正式生");
            $table->string('path')->default("null.png");
            $table->string('name',30);
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'uid'=>'3A617006', 'type'=>'正式生', 'name'=>'學生姓名', 'path'=>'null.png',
                'password'=>'$2y$10$8wlytHfkk4T4UQRH37qiX.bXuLL2fMfBvCx3QCAXBfeJ4z38gNlTu',
                'email'=>'s3A617006@student.ncut.edu.tw'
            ],
            [
                'uid'=>'3A617007', 'type'=>'正式生', 'name'=>'學生姓名', 'path'=>'null.png',
                'password'=>'$2y$10$ARMTJHjSj0oIYtrgjLgl2.EvKx10tWZHNIU6bdgOti18HUdYOJ7pW',
                'email'=>'s3A617007@student.ncut.edu.tw'
            ],
            [
                'uid'=>'3A617008', 'type'=>'正式生', 'name'=>'學生姓名', 'path'=>'null.png',
                'password'=>'$2y$10$t9Q00SxCmPbesowvB.XAY.648wt3hxHTzCdhet1DOPDVv1zI9FSo6',
                'email'=>'s3A617008@student.ncut.edu.tw'
            ],
            [
                'uid'=>'3A617009', 'type'=>'正式生', 'name'=>'學生姓名', 'path'=>'null.png',
                'password'=>'$2y$10$/lRGE/PXmoACSRoJPhAWz.xQhJ3I0.Nseo9WrgqnLzvJE9px.uQyW',
                'email'=>'s3A617009@student.ncut.edu.tw'
            ],
            [
                'uid'=>'3A617010', 'type'=>'正式生', 'name'=>'學生姓名', 'path'=>'null.png',
                'password'=>'$2y$10$Pxnf6ZS1R7PRjTn7Edj1TOTsbtbjvdd/uz2cFyacr1HGwf9OeQqHS',
                'email'=>'s3A617010@student.ncut.edu.tw'
            ],
            [
                'uid'=>'3A432100', 'type'=>'正式生', 'name'=>'測試者', 'path'=>'null.png',
                'password'=>'$2y$10$8eq2Ktbl/gy7w/OopgXFPONx7S.NFJOZlKWcsAS36h0Img4PrgYhG',
                'email'=>'s3A432100@ncut.edu.tw'
            ],
            [
                'uid'=>'3A123400', 'type'=>'助教', 'name'=>'管理者', 'path'=>'null.png',
                'password'=>'$2y$10$b9FiQiX31N19fIK0BHz.juTkSQhHYbQnaz53i3JWpRuNxUiHXsQya',
                'email'=>'s3A123400@ncut.edu.tw'
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
        Schema::dropIfExists('users');
    }
}
