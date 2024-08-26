<?php

namespace App\Imports;

use Modules\MasterData\Entities\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class SiswaImport implements ToModel
{
  use Importable;

  protected $angkatan;
  protected $categoryId;

  public function __construct($angkatan, $categoryId)
  {
    $this->angkatan = $angkatan;
    $this->categoryId = $categoryId;
  }

  public function model(array $row)
  {
    return new Siswa([
      'name' => $row[1],
      'nisn' => $row[2],
      'tahun_masuk_id' => $this->angkatan, // Menggunakan angkatan dari request
      'category_id' => $this->categoryId,  // Menggunakan category_id dari request
    ]);
  }
}
