<?php

namespace Modules\Dashboard\Http\Controllers;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\History\Entities\History;
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

  public function get_ajax_statistik()
  {
    $data = History::latest()->get()->map(function ($item) {
      $item->tanggal_transaksi = Carbon::parse($item->tanggal_transaksi)->format('d-m-Y');
      if ($item->nominal) {
        $item->nominal = number_format($item->nominal / 1000, 0) . 'k';
      } else {
        $item->nominal = '0k';
      }
      return $item;
    });
    return response()->json($data);
  }
  public function get_ajax_statistik_seminggu()
  {
    $tanggal_awal = Carbon::now()->subDays(7);
    $tanggal_akhir = Carbon::today();

    $data = History::whereBetween('tanggal_transaksi', [$tanggal_awal, $tanggal_akhir])
      ->latest()
      ->get()
      ->map(function ($item) {
        $item->tanggal_transaksi = Carbon::parse($item->tanggal_transaksi)->format('d-m-Y');
        if ($item->nominal) {
          $item->nominal = number_format($item->nominal / 1000, 0) . 'k';
        } else {
          $item->nominal = '0k';
        }
        return $item;
      });

    return response()->json($data);
  }
  public function get_ajax_statistik_sebulan()
  {
    $tanggal_awal = Carbon::now()->subMonth();
    $tanggal_akhir = Carbon::today();

    $data = History::whereBetween('tanggal_transaksi', [$tanggal_awal, $tanggal_akhir])
      ->latest()
      ->get()
      ->map(function ($item) {
        $item->tanggal_transaksi = Carbon::parse($item->tanggal_transaksi)->format('d-m-Y');
        if ($item->nominal) {
          $item->nominal = number_format($item->nominal / 1000, 0) . 'k';
        } else {
          $item->nominal = '0k';
        }
        return $item;
      });

    return response()->json($data);
  }
  public function get_ajax_statistik_3sebulan()
  {
    $tanggal_awal = Carbon::now()->subMonths(3);
    $tanggal_akhir = Carbon::today();

    $data = History::whereBetween('tanggal_transaksi', [$tanggal_awal, $tanggal_akhir])
      ->latest()
      ->get()
      ->map(function ($item) {
        $item->tanggal_transaksi = Carbon::parse($item->tanggal_transaksi)->format('d-m-Y');
        if ($item->nominal) {
          $item->nominal = number_format($item->nominal / 1000, 0) . 'k';
        } else {
          $item->nominal = '0k';
        }
        return $item;
      });

    return response()->json($data);
  }

  public function get_ajax_statistik_6sebulan()
  {
    $tanggal_awal = Carbon::now()->subMonths(6);
    $tanggal_akhir = Carbon::today();

    $data = History::whereBetween('tanggal_transaksi', [$tanggal_awal, $tanggal_akhir])
      ->latest()
      ->get()
      ->map(function ($item) {
        $item->tanggal_transaksi = Carbon::parse($item->tanggal_transaksi)->format('d-m-Y');
        if ($item->nominal) {
          $item->nominal = number_format($item->nominal / 1000, 0) . 'k';
        } else {
          $item->nominal = '0k';
        }
        return $item;
      });

    return response()->json($data);
  }

  public function get_ajax_statistik_setahun()
  {
    $tanggal_awal = Carbon::now()->subYear();
    $tanggal_akhir = Carbon::today();

    $data = History::whereBetween('tanggal_transaksi', [$tanggal_awal, $tanggal_akhir])
      ->latest()
      ->get()
      ->map(function ($item) {
        $item->tanggal_transaksi = Carbon::parse($item->tanggal_transaksi)->format('d-m-Y');
        if ($item->nominal) {
          $item->nominal = number_format($item->nominal / 1000, 0) . 'k';
        } else {
          $item->nominal = '0k';
        }
        return $item;
      });

    return response()->json($data);
  }







}
