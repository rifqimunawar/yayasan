<?php

namespace App\Exports;

use Modules\MasterData\Entities\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaCategoryExport implements FromCollection
{
  protected $categoryId;

  public function __construct($id)
  {
    $this->categoryId = $id;
  }

  public function collection()
  {
    return Siswa::select('id', 'name', 'nisn')
      ->where('category_id', $this->categoryId)
      ->get();
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
