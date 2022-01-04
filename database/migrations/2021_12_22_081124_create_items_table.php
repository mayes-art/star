<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id()->comment('商品編號');
            $table->string('name')->comment('商品名稱');
            $table->integer('item_category_id')->comment('分類ID');
            $table->integer('storage_id')->comment('儲位ID');
            $table->string('description')->comment('商品描述');
            $table->decimal('price', 8, 2)->comment('商品價格');
            $table->integer('stock')->comment('庫存量');
            $table->tinyInteger('status')->default(0)->comment('狀態(0:未進/1:上架/2:下架)');
            $table->tinyInteger('is_delete')->default(0)->comment('是否刪除(0:否/1:是)');
            $table->datetime('created_at')->nullable()->comment('新增時間');
            $table->datetime('updated_at')->nullable()->comment('更新時間');
            $table->datetime('on_shelf')->nullable()->comment('上架時間');
            $table->datetime('off_shelf')->nullable()->comment('下架時間');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
