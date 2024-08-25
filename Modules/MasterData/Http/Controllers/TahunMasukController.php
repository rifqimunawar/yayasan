<?php

namespace Modules\MasterData\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Modules\MasterData\Entities\TahunMasuk;
use Illuminate\Contracts\Support\Renderable;

class TahunMasukController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index()
  {
    $title = 'Data Tahun Masuk Siswa';
    $data = TahunMasuk::with('siswas')->latest()->get();

    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    return view('masterdata::tahun-masuk.index', ['data' => $data, 'title' => $title]);
  }

  /**
   * Show the form for creating a new resource.
   * @return Renderable
   */
  public function create()
  {
    $title = "Data Tahun Masuk Siswa";
    return view('masterdata::tahun-masuk.create', ['title' => $title]);
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @return Renderable
   */
  public function store(Request $request)
  {
    $data = $request->all();
    $newData = TahunMasuk::create($data);

    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('tahun_masuk.index');
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
    $title = "Update Tahun Masuk";
    $data = TahunMasuk::findOrFail($id);
    return view('masterdata::tahun-masuk.edit', ['data' => $data, 'title' => $title]);
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
    $updateData = TahunMasuk::findOrFail($id);
    $updateData->update($data);
    Alert::success('Success', 'Data berhasil diupdate');
    return redirect()->route('tahun_masuk.index');
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Renderable
   */
  public function destroy($id)
  {
    $data = TahunMasuk::findOrFail($id);
    if ($data->siswas()->count() > 0) {
      Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki data siswa');
      return redirect()->route('siswa.index');
    }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('siswa.index');
  }
}
