<?php

namespace Modules\MasterData\Entities;

use Modules\History\Entities\History;
use Illuminate\Database\Eloquent\Model;
use Modules\MasterData\Entities\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tagihan extends Model
{
  use SoftDeletes;

  protected $guarded = ([]);

  public function siswas()
  {
    return $this->belongsToMany(Siswa::class, 'siswa_tagihan')->withTimestamps();
  }
  public function category()
  {
    return $this->belongsTo(Category::class, 'category_id');
  }

  // Relasi ke History
  public function histories()
  {
    return $this->hasMany(History::class);
  }
}
