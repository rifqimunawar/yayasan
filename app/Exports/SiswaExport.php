<?php

namespace App\Exports;

use Modules\MasterData\Entities\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromCollection
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    return Siswa::select('id', 'name', 'nisn')->get();
  }

  public function headings() : array
  {
    return [
      'ID',
      'Nama',
      'NISN',
    ];
  }
}
