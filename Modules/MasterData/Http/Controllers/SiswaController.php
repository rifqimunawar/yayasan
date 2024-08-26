<?php

namespace Modules\MasterData\Http\Controllers;

use App\Exports\SiswaCategoryExport;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\MasterData\Entities\Category;
use Modules\MasterData\Entities\Siswa;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Modules\MasterData\Entities\TahunMasuk;
use Illuminate\Contracts\Support\Renderable;

class SiswaController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index(Request $request)
  {
    $title = 'Data Siswa';
    $search = $request->input('search');

    if ($search) {
      $data = Siswa::with(['tahunMasuk', 'category'])
        ->where('category_id', 'like', '%' . $search . '%')
        ->latest()
        ->get();
    } else {
      $data = Siswa::with(['tahunMasuk', 'category'])->get();
    }

    return view('masterdata::siswa.index', [
      'data' => $data,
      'title' => $title
    ]);
  }


  /**
   * Show the form for creating a new resource.
   * @return Renderable
   */
  public function create()
  {
    $title = "Siswa Baru";
    $data = TahunMasuk::latest()->get();

    return view('masterdata::siswa.create', ['data' => $data, 'title' => $title]);
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @return Renderable
   */
  public function store(Request $request)
  {
    // Validasi input
    $validator = Validator::make($request->all(), [
      // 'name' => 'required|string|max:255',
      // 'nisn' => 'required|numeric|digits:8',
      'tahun_masuk_id' => 'required|exists:tahun_masuks,id',
    ], [
      'name.required' => 'Nama wajib diisi.',
      'nisn.required' => 'NISN wajib diisi.',
      'nisn.numeric' => 'NISN harus berupa angka.',
      'nisn.digits' => 'NISN harus terdiri dari 8 digit.',
      'tahun_masuk_id.required' => 'Tahun Masuk wajib dipilih.',
      'tahun_masuk_id.exists' => 'Tahun Masuk yang dipilih tidak valid.',
    ]);

    // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan error
    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput();
    }

    // Simpan data ke database
    $newData = Siswa::create($request->all());

    // Tampilkan pesan sukses
    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('siswa.index');
  }


  /**
   * Show the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function show($id)
  {
    return view('masterdata::siswa.show');
  }

  /**
   * Show the form for editing the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function edit($id)
  {
    $title = "Update SIswa";
    $data = Siswa::findOrFail($id);
    $tahun_masuk = TahunMasuk::latest()->get();
    return view('masterdata::siswa.edit', ['tahun_masuk' => $tahun_masuk, 'data' => $data, 'title' => $title]);
  }

  /**
   * Update the specified resource in storage.
   * @param Request $request
   * @param int $id
   * @return Renderable
   */
  public function update(Request $request, $id)
  {
    $data = $request->all();
    $updateData = Siswa::findOrFail($id);
    $updateData->update($data);
    Alert::success('Success', 'Data berhasil diupdate');
    return redirect()->route('siswa.index');
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Renderable
   */
  public function destroy($id)
  {
    $data = Siswa::findOrFail($id);
    // if ($data->tagihans()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki tagihan');
    //   return redirect()->route('siswa.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('siswa.index');
  }

  public function createImport()
  {
    $title = 'Data Siswa';
    $tahun = TahunMasuk::latest()->get();
    return view('masterdata::siswa.create-import', ['tahun' => $tahun, 'title' => $title]);
  }

  public function import(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'file' => 'required|mimes:xlsx,csv,xls',
      'angkatan' => 'required',
      'category_id' => 'required',
    ]);

    // dd($request);
    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
      Excel::import(new SiswaImport($request->angkatan, $request->category_id), $request->file('file'));

      Alert::success('Success', 'Data berhasil diimpor');
    } catch (\Exception $e) {
      Alert::error('Oops...', 'Terjadi kesalahan saat mengimport data, mohon perbaiki data');
      return redirect()->route('siswa.index');
    }

    return redirect()->route('siswa.index');
  }



  public function export()
  {
    return Excel::download(new SiswaExport, 'siswa.xlsx');
  }

  public function exportKategori($id)
  {
    $category = Category::findOrFail($id);
    return Excel::download(new SiswaCategoryExport($id), 'siswa-' . $category->name . '.xlsx');
  }

}
