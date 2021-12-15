<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id()->comment('編號');
            $table->string('email')->comment('信箱');
            $table->string('account')->unique()->comment('帳號');
            $table->string('nickname')->comment('暱稱');
            $table->integer('role_id')->comment('角色ID');
            $table->string('password')->comment('密碼');
            $table->tinyInteger('status')->comment('啟用狀態');
            $table->datetime('created_at')->nullable()->comment('新增時間');
            $table->datetime('updated_at')->nullable()->comment('更新時間');
            $table->datetime('last_login_at')->nullable()->comment('最後登入時間');
        });
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
