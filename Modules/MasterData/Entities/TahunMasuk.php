<?php

namespace Modules\MasterData\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TahunMasuk extends Model
{
  use HasFactory, SoftDeletes;

  protected $guarded = ([]);

  public function siswas()
  {
    return $this->hasMany(Siswa::class, 'tahun_masuk_id');
  }

}
