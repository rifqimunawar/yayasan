<?php

namespace Modules\Roles\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roles extends Model
{
  use HasFactory;

  protected $guarded = ([]);
  // Relasi dengan User
  public function users()
  {
    return $this->hasMany(User::class, 'role_id');
  }
}
