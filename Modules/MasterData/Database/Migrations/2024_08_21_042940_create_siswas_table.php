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
    Schema::create('siswas', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->unsignedBigInteger('nisn');
      $table->unsignedBigInteger('tahun_masuk_id')->default(1);
      $table->softDeletes();
      $table->timestamps();

      $table->foreign('tahun_masuk_id')->references('id')->on('tahun_masuks')->onDelete('cascade');
    });
  }


  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('siswas');
  }
};
