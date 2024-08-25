<?php

namespace Modules\Roles\Http\Controllers;

use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Roles\Entities\Roles;
use RealRashid\SweetAlert\Facades\Alert;

class RolesController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index()
  {
    $title = 'Roles';
    $data = Roles::with('users')->get();

    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    return view('roles::roles.index', ['data' => $data, 'title' => $title]);
  }

  /**
   * Show the form for creating a new resource.
   * @return Renderable
   */
  public function create()
  {
    $title = 'Roles';
    return view('roles::roles.create', ['title' => $title]);
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @return Renderable
   */
  public function store(Request $request)
  {
    $data = $request->all();
    $newData = Roles::create($data);

    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('roles.index');
  }


  /**
   * Show the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function show($id)
  {
    return view('roles::show');
  }

  /**
   * Show the form for editing the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function edit($id)
  {
    $title = 'Edit Roles';
    $data = Roles::findOrFail($id);
    return view('roles::roles.edit', ['data' => $data, 'title' => $title]);
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
    $updateData = Roles::findOrFail($id);
    $updateData->update($data);
    Alert::success('Success', 'Data berhasil diupdate');
    return redirect()->route('roles.index');
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Renderable
   */
  public function destroy($id)
  {
    $data = Roles::findOrFail($id);
    if ($data->users()->count() > 0) {
      Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki members');
      return redirect()->route('roles.index');
    }
    $data->delete();
    Alert::success('Success', 'Data berhasil dihapus');
    return redirect()->route('roles.index');
  }
}
