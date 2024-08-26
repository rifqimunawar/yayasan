<?php

namespace Modules\MasterData\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MasterData\Entities\Category;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index()
  {
    $title = 'Category Siswa';
    $data = Category::with('siswa')->get();
    return view('masterdata::category.index', ['data' => $data, 'title' => $title]);
  }

}
