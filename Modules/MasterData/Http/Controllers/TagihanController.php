<?php

namespace Modules\MasterData\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MasterData\Entities\Siswa;
use Modules\MasterData\Entities\Tagihan;
use Modules\MasterData\Entities\TahunMasuk;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;

class TagihanController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index(Request $request)
  {
    $title = 'Data Tagihan Siswa';
    $search = $request->input('search');

    if ($search) {
      $data = Tagihan::where('category_id', 'like', '%' . $search . '%')
        ->latest()
        ->get();
    } else {
      $data = Tagihan::latest()->get();
    }

    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    return view('masterdata::tagihan.index', ['data' => $data, 'title' => $title]);
  }

  /**
   * Show the form for creating a new resource.
   * @return Renderable
   */
  public function create()
  {
    $title = "Data Tagihan Siswa";
    return view('masterdata::tagihan.create', ['title' => $title]);
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @return Renderable
   */
  public function store(Request $request)
  {
    try {
      // Validasi data input
      $request->validate([
        'category_id' => 'required|exists:categories,id',
      ]);

      // Memproses dan menyimpan data
      $data = $request->all();
      if (isset($data['nominal'])) {
        $data['nominal'] = preg_replace('/[^0-9]/', '', $data['nominal']);
      }

      $newData = Tagihan::create($data);

      Alert::success('Success', 'Data berhasil disimpan');
      return redirect()->route('tagihan.index');
    } catch (\Illuminate\Validation\ValidationException $e) {
      Alert::error('Oops...', 'Silahkan isi kategorinya.');
      return redirect()->route('tagihan.create');
    }
  }



  /**
   * Show the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function show($id)
  {
    return view('masterdata::show');
  }

  /**
   * Show the form for editing the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function edit($id)
  {
    $title = "Update Tagihan";
    $data = Tagihan::findOrFail($id);
    return view('masterdata::tagihan.edit', ['data' => $data, 'title' => $title]);
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
    $data = $request->all();
    if (isset($data['nominal'])) {
      $data['nominal'] = preg_replace('/[^0-9]/', '', $data['nominal']);
    }
    $updateData = Tagihan::findOrFail($id);
    $updateData->update($data);
    Alert::success('Success', 'Data berhasil diupdate');
    return redirect()->route('tagihan.index');
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Renderable
   */
  public function destroy($id)
  {
    $data = Tagihan::findOrFail($id);
    // if ($data->siswas()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data siswa');
    //   return redirect()->route('siswa.index');
    // }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('tagihan.index');
  }

  public function tagihan($id, $id_category)
  {
    $siswa = Siswa::with('category')->where('category_id', $id_category)->latest()->get();
    $data = Tagihan::with('category')->findOrFail($id);
    $tahun = TahunMasuk::latest()->get();
    $title = "Setting Tagihan " . $data->name;

    // dd($siswa);
    return view('masterdata::tagihan.setting', ['siswa' => $siswa, 'tahun' => $tahun, 'data' => $data, 'title' => $title]);
  }

  public function hubungkanTagihanDenganTarget($tagihanId, Request $request)
  {
    // Validasi: Jika kedua field 'siswa' dan 'angkatan' diisi atau tidak diisi sama sekali
    if (($request->filled('siswa') && $request->filled('angkatan')) || (!$request->filled('siswa') && !$request->filled('angkatan'))) {
      Alert::error('Oops...', 'Pilih salah satu, siswa atau angkatan');
      $siswa = Siswa::latest()->get();
      $data = Tagihan::with('category')->findOrFail($tagihanId);
      $tahun = TahunMasuk::latest()->get();
      $title = "Setting Tagihan " . $data->name;
      return view('masterdata::tagihan.setting', ['siswa' => $siswa, 'tahun' => $tahun, 'data' => $data, 'title' => $title]);
    }

    $tagihan = Tagihan::findOrFail($tagihanId);

    // Untuk perorangan
    if ($request->filled('siswa')) {
      $siswaId = $request->input('siswa');
      $siswa = Siswa::with('category')->findOrFail($siswaId);

      if (!$tagihan->siswas->contains($siswa->id)) {
        $tagihan->siswas()->attach($siswa);
      }

      $id = $tagihanId;
      $id_category = $siswa->category->id;
      Alert::success('Success', 'Siswa ' . $siswa->name . ' memiliki tagihan ' . $tagihan->name);
      return redirect()->route('tagihan.setting', [$id, $id_category]);
    }

    // Untuk berdasarkan angkatan
    if ($request->filled('angkatan')) {
      $angkatanId = $request->input('angkatan');
      $siswaAngkatan = Siswa::where('tahun_masuk_id', $angkatanId)->get();

      foreach ($siswaAngkatan as $siswa) {
        if (!$tagihan->siswas->contains($siswa->id)) {
          $tagihan->siswas()->attach($siswa);
        }
      }
      $id = $tagihanId;
      $id_category = $siswa->category->id;
      Alert::success('Success', 'Semua siswa dari angkatan yang dipilih memiliki tagihan ' . $tagihan->name);
      return redirect()->route('tagihan.setting', [$id, $id_category]);
    }
  }

}
