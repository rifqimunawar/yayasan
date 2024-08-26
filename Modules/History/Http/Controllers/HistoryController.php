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
    if ($search) {
      $data = History::with(['siswa.tagihans', 'users'])
        ->whereHas('siswa', function ($query) use ($search) {
          $query->where('category_id', 'like', '%' . $search . '%');
        })
        ->latest()
        ->get();
    } else {
      $data = History::with(['siswa.tagihans', 'users'])->latest()->get();
    }

    return view('history::index', ['data' => $data, 'title' => $title]);
  }

}
