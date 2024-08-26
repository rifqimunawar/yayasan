<?php

namespace Modules\MasterData\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
  use HasFactory;

  protected $fillable = [];

  public function tagihans()
  {
    return $this->hasMany(Tagihan::class, 'role_id');
  }
  public function siswa()
  {
    return $this->hasMany(Siswa::class, 'category_id');
  }
}
