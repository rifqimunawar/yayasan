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
    Schema::create('siswa_tagihan', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('siswa_id');
      $table->unsignedBigInteger('tagihan_id');
      $table->integer('status')->default(0);
      $table->integer('nominal_tagihan')->default(0);
      $table->integer('nominal_tagihan_terbayar')->default(0);
      $table->timestamps();
      // Foreign key constraints
      $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
      $table->foreign('tagihan_id')->references('id')->on('tagihans')->onDelete('cascade');

      // Indexes to optimize the relationship
      $table->index(['siswa_id']);
      $table->index(['tagihan_id']);
    });
  }


  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('siswa_tagihan');
  }
};
