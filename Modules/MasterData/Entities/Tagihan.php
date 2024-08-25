<?php

namespace Modules\MasterData\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tagihan extends Model
{
  use SoftDeletes;

  protected $guarded = ([]);

  public function siswas()
  {
    return $this->belongsToMany(Siswa::class, 'siswa_tagihan')->withTimestamps();
  }
}
