<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id()->comment('編號');
            $table->string('username')->unique()->comment('帳號');
            $table->string('password')->comment('密碼');
            $table->tinyInteger('status')->default(1)->comment('狀態(0:停用/1:啟用)');
            $table->tinyInteger('level')->default(0)->comment('等級(0:未驗證/1:普通/2:vip)');
            $table->tinyInteger('gender')->comment('性別(1:男/2:女)');
            $table->string('birthday')->comment('生日');
            $table->string('name')->comment('姓名');
            $table->string('phone')->nullable()->comment('手機號碼');
            $table->string('email')->nullable()->unique()->comment('信箱');
            $table->string('address')->nullable()->comment('地址');
            $table->datetime('created_at')->nullable()->comment('註冊時間');
            $table->datetime('updated_at')->nullable()->comment('更新時間');
            $table->datetime('last_login_at')->nullable()->comment('最後登入時間');
            $table->softDeletes()->comment('刪除時間');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
