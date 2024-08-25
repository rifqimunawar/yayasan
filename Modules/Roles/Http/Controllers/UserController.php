<?php

namespace Modules\Roles\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Modules\Roles\Entities\Roles;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index()
  {
    $title = 'Data User';
    $data = User::with('role')->get();

    $alert = 'Delete Data!';
    $text = "Are you sure you want to delete?";
    confirmDelete($alert, $text);

    return view('roles::user.index', ['data' => $data, 'title' => $title]);
  }

  /**
   * Show the form for creating a new resource.
   * @return Renderable
   */
  public function create()
  {
    $title = 'Tambah User';
    $data = Roles::all();
    return view('roles::user.create', ['data' => $data, 'title' => $title]);
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @return Renderable
   */
  public function store(Request $request)
  {
    // Rule validasi untuk name dan password
    $rules = [
      'name' => 'required|unique:users,name',
      'username' => 'required|unique:users,username|regex:/^[a-z0-9]+$/',
      'email' => 'required|unique:users,email',
      'password' => 'required|min:8',
      'role_id' => 'required',
    ];

    $messages = [
      'name.required' => 'Nama wajib diisi.',
      'name.unique' => 'Nama sudah digunakan.',
      'username.required' => 'Username wajib diisi.',
      'username.unique' => 'Username sudah digunakan.',
      'username.regex' => 'Username hanya boleh menggunakan huruf kecil dan angka, tanpa spasi.',
      'email.required' => 'Email wajib diisi.',
      'email.unique' => 'Email sudah digunakan.',
      'password.required' => 'Password wajib diisi.',
      'password.min' => 'Password minimal 8 karakter.',
      'role_id.required' => 'Role user harus dipilih.',
    ];

    // Validasi input
    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput();
    }

    // Buat user baru
    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'role_id' => $request->role_id,
      'password' => Hash::make($request->password),
    ]);

    Alert::success('Success', 'Data berhasil disimpan');
    return redirect()->route('user.index');
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
    $title = 'Edit User';
    $data = User::findOrFail($id);
    $role = Roles::all();
    return view('roles::user.edit', ['data' => $data, 'role' => $role, 'title' => $title]);
  }

  /**
   * Update the specified resource in storage.
   * @param Request $request
   * @param int $id
   * @return Renderable
   */
  public function update(Request $request, $id)
  {
    // Rule validasi untuk name dan password (tanpa unique)
    $rules = [
      'name' => 'required',
      'email' => 'required',
      'password' => 'nullable|min:8',
      'role_id' => 'required',
    ];

    $messages = [
      'name.required' => 'Nama wajib diisi.',
      'email.required' => 'Email wajib diisi.',
      'password.min' => 'Password minimal 8 karakter.',
      'role_id.required' => 'Role user harus dipilih.',
    ];

    // Validasi input
    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput();
    }

    // Cari user berdasarkan id
    $user = User::findOrFail($id);

    // Update data user
    $user->update([
      'name' => $request->name,
      'email' => $request->email,
      'role_id' => $request->role_id,
      // Hanya update password jika diisi
      'password' => $request->password ? Hash::make($request->password) : $user->password,
    ]);

    Alert::success('Success', 'Data berhasil diperbarui');
    return redirect()->route('user.index');
  }


  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Renderable
   */
  public function destroy($id)
  {
    // $data = Roles::findOrFail($id);
    // if ($data->users()->count() > 0) {
    //   Alert::error('Oops....', 'Data tidak dapat dihapus karena memiliki members');
    //   return redirect()->route('roles.index');
    // }
    // $data->delete();
    // Alert::success('Success', 'Data berhasil dihapus');
    // return redirect()->route('roles.index');
    Alert::error('Oops....', 'user tidak dapat dihapus!!!');
    return redirect()->route('roles.index');
  }
}
