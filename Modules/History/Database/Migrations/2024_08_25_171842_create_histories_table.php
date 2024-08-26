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
    Schema::create('histories', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('nominal');
      $table->timestamp('tanggal_transaksi');
      $table->unsignedBigInteger('siswa_id');
      $table->unsignedBigInteger('tagihan_id');
      $table->unsignedBigInteger('siswa_tagihan_id');
      $table->unsignedBigInteger('user_id');
      $table->softDeletes();
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
    Schema::dropIfExists('histories');
  }
};
