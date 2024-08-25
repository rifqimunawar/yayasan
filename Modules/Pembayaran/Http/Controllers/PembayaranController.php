<?php

namespace Modules\Pembayaran\Http\Controllers;

use App\Helpers\Fungsi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\MasterData\Entities\Siswa;
use Modules\MasterData\Entities\Tagihan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;

class PembayaranController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index()
  {
    $title = 'Data Siswa';
    $data = Siswa::with('tagihans')->get();
    return view('pembayaran::pembayaran.index', ['data' => $data, 'title' => $title]);
  }


  public function show($id)
  {
    $title = "Detail Tagihan";
    $siswa = Siswa::findOrFail($id);
    $tagihan = $siswa->tagihans;

    $alert = 'Anda Yakin!';
    $text = "Siswa tersebut sudah melunasi pembayaran?";
    confirmDelete($alert, $text);

    // dd($tagihan);
    return view('pembayaran::pembayaran.show', [
      'tagihan' => $tagihan,
      'siswa' => $siswa,
      'title' => $title
    ]);
  }

  public function lunas($tagihanId, $siswaId)
  {
    $tagihan = Tagihan::findOrFail($tagihanId);
    $siswa = Siswa::findOrFail($siswaId);

    $siswa->tagihans()->updateExistingPivot($tagihan->id, [
      'status' => 1,
      'nominal_tagihan_terbayar' => $tagihan->nominal,
    ]);

    Alert::success('Success', 'Siswa sudah melunasi tagihannya');

    return redirect()->route('pembayaran.show', $siswaId);
  }


  public function hubungkanTagihanDenganSiswa($tagihanId, $siswaId)
  {
    $tagihan = Tagihan::findOrFail($tagihanId);
    $siswa = Siswa::findOrFail($siswaId);

    if (!$tagihan->siswas->contains($siswa->id)) {
      $tagihan->siswas()->attach($siswa);
    }

    return "Siswa berhasil dihubungkan dengan tagihan.";
  }

  public function make($siswa_tagihan_id, $siswa_id)
  {
    $title = 'Pembayaran';

    // $siswa_id = 2;
    $data = Siswa::with([
      'tagihans' => function ($query) use ($siswa_tagihan_id) {
        $query->where('siswa_tagihan.id', $siswa_tagihan_id);
      }
    ])->findOrFail($siswa_id);



    $dataTagihan = 0;
    if ($data && $data->tagihans->isNotEmpty()) {
      $nominal_tagihan = $data->tagihans->first()->nominal ?? 0;

      $nominal_tagihan_terbayar = DB::table('siswa_tagihan')
        ->where('id', $siswa_tagihan_id)
        ->value('nominal_tagihan_terbayar') ?? 0;

      $sisa_nominal = $nominal_tagihan - $nominal_tagihan_terbayar;

      return view('pembayaran::pembayaran.make', [
        'data' => $data,
        'title' => $title,
        'sisa_nominal' => $sisa_nominal
      ]);
    }

    // Jika data tidak ditemukan
    Alert::error('Oops...', 'Data tidak ditemukan');
    return redirect()->route('pembayaran.show', $siswa_id);
  }



  public function savePembayaran(Request $request)
  {
    $data = $request->all();
    if (isset($data['nominal'])) {
      $data['nominal'] = preg_replace('/[^0-9]/', '', $data['nominal']);
    }

    $siswa_tagihan_id = $request->siswa_tagihan_id;
    $siswa_id = $request->siswa_id;
    $tagihan_id = $request->tagihan_id;
    $nominalInput = $data['nominal'];

    $siswa_tagihan = DB::table('siswa_tagihan')->where('id', $siswa_tagihan_id)->first();
    $tagihan = DB::table('tagihans')->where('id', $tagihan_id)->first();

    if ($siswa_tagihan && $tagihan) {
      $nominalTerbayar = $siswa_tagihan->nominal_tagihan_terbayar;
      $totalNominal = $nominalTerbayar + $nominalInput;

      if ($totalNominal >= $tagihan->nominal) {
        DB::table('siswa_tagihan')->where('id', $siswa_tagihan_id)->update(['status' => 1]);
      }

      DB::table('siswa_tagihan')->where('id', $siswa_tagihan_id)->update(['nominal_tagihan_terbayar' => $totalNominal]);

      $sisa = $totalNominal - $tagihan->nominal;
    } else {
      Alert::error('Oops...', 'Transaksi gagal');
      return redirect()->route('pembayaran.make', [$siswa_tagihan_id, $siswa_id]);
    }

    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('pembayaran.make', [$siswa_tagihan_id, $siswa_id]);
  }






  public function invoice($id)
  {
    $title = 'Data Siswa';
    $data = Siswa::with('tagihans')->get();

    return view('pembayaran::pembayaran.invoice', ['data' => $data, 'title' => $title]);
  }
}
