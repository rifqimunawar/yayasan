<?php

namespace Modules\History\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\History\Entities\History;
use Modules\MasterData\Entities\Siswa;
use Illuminate\Contracts\Support\Renderable;

class HistoryController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index(Request $request)
  {
    $title = 'Tagihan Pembayaran Siswa';

    $search = $request->input('search');
    $from_date = $request->input('from_date');
    $to_date = $request->input('to_date');

    $query = History::with(['siswa.tagihans', 'users']);

    if ($search && $search !== 'custom') {
      if ($search !== 'seminggu') {
        $query->whereHas('siswa', function ($query) use ($search) {
          $query->where('category_id', 'like', '%' . $search . '%');
        })->orWhereDate('tanggal_transaksi', $search);
      }
    }

    if ($from_date && $to_date) {
      $query->whereBetween('tanggal_transaksi', [$from_date, $to_date]);
    }

    $data = $query->latest()->get();

    return view('history::index', ['data' => $data, 'title' => $title]);
  }




}
