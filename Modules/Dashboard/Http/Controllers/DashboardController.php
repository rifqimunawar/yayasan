<?php

namespace Modules\Dashboard\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MasterData\Entities\Siswa;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index()
  {
    $totalSiswa = Siswa::count();
    $totalPembayaran = Siswa::with('tagihans')->get();
    $totalNominal = 0;
    foreach ($totalPembayaran as $siswa) {
      $totalNominal += $siswa->tagihans->sum('nominal');
    }

    $totalNominalMasuk = DB::table('siswa_tagihan')->sum('nominal_tagihan_terbayar');

    return view('dashboard::index', ['totalNominalMasuk' => $totalNominalMasuk, 'totalNominal' => $totalNominal, 'totalSiswa' => $totalSiswa]);
  }

  /**
   * Show the form for creating a new resource.
   * @return Renderable
   */
  public function create()
  {
    return view('dashboard::create');
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @return Renderable
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Show the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function show($id)
  {
    return view('dashboard::show');
  }

  /**
   * Show the form for editing the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function edit($id)
  {
    return view('dashboard::edit');
  }

  /**
   * Update the specified resource in storage.
   * @param Request $request
   * @param int $id
   * @return Renderable
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Renderable
   */
  public function destroy($id)
  {
    //
  }
}
