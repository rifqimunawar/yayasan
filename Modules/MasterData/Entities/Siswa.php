<?php

namespace Modules\MasterData\Entities;

use Modules\History\Entities\History;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
  use SoftDeletes;

  protected $guarded = ([]);

  public function tahunMasuk()
  {
    return $this->belongsTo(TahunMasuk::class, 'tahun_masuk_id');
  }
  public function tagihans()
  {
    return $this->belongsToMany(Tagihan::class, 'siswa_tagihan')
      ->withPivot('id', 'status', 'nominal_tagihan', 'nominal_tagihan_terbayar')
      ->withTimestamps();
  }
  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id');
  }

  public function histories()
  {
    return $this->hasMany(History::class);
  }
}
