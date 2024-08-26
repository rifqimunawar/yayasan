<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tagihans', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->unsignedBigInteger('nominal');
      $table->unsignedBigInteger('category_id')->default(1);
      $table->softDeletes();
      $table->timestamps();

      $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    });
  }


  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('tagihans');
  }
};
