<?php

namespace Modules\History\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\MasterData\Entities\Siswa;
use Illuminate\Database\Eloquent\Model;
use Modules\MasterData\Entities\Tagihan;
use Modules\MasterData\Entities\TahunMasuk;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
  use HasFactory, SoftDeletes;

  protected $guarded = ([]);

  public function siswa()
  {
    return $this->belongsTo(Siswa::class, 'siswa_id');
  }

  public function tagihan()
  {
    return $this->belongsTo(Tagihan::class, 'tagihan_id');
  }
  public function tagihans()
  {
    return $this->siswa->tagihans();
  }

  public function users()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
  // catatan cara mengambil data dari table pivot
//   $histories = History::with(['siswa', 'tahunMasuk', 'tagihan'])->latest()->get();

  // foreach ($histories as $history) {
//     echo 'Siswa: ' . $history->siswa->name;
//     echo 'Tahun Masuk: ' . $history->tahunMasuk->tahun;
//     echo 'Tagihan: ' . $history->tagihan->nama_tagihan;

  //     // Mengakses tagihan dari tabel pivot
//     foreach ($history->tagihans as $tagihan) {
//         echo 'Tagihan dari Pivot: ' . $tagihan->nama_tagihan; // Gantilah 'nama_tagihan' dengan kolom yang sesuai
//     }
// }
}
