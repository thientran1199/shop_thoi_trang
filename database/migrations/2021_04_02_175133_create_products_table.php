<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique(); //bang cac mat hang, ten mat hang khong trung nhau
            $table->string('alias');
            $table->integer('price');
            $table->integer('price_new');
            $table->string('status');
            $table->text('intro');
            $table->longText('content');
            $table->string('image');
            $table->string('keywords');
            $table->text('description');
            $table->integer('user_id')->unsigned(); //khoa ngoai toi bang user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('cate_id')->unsigned(); //khoa ngoai toi bang cate
            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
