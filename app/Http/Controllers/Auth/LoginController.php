<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
  public function showLoginForm()
  {
    if (Auth::check()) {
      return redirect('/dashboard');
    }
    return view('pages.login');
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
      // Authentication passed...
      Alert::success('Sucess', 'Anda Sudah Masuk');
      return redirect()->intended('/dashboard');
    } else {
      // Authentication failed...
      Alert::error('Error', 'Username atau password salah!!!');
      return redirect()->route('login');
    }
  }

  public function showRegistrationForm()
  {
    return view('pages.auth.register');
  }
  public function register(Request $request)
  {
    // Rule validasi untuk name dan password
    $rules = [
      'name' => 'required|unique:users,name',
      'email' => 'required|unique:users,email',
      // 'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
    ];

    $messages = [
      'name.required' => 'Nama wajib diisi.',
      'name.unique' => 'Nama sudah digunakan.',
      'email.required' => 'Email wajib diisi.',
      'email.unique' => 'Email sudah digunakan.',
      'password.required' => 'Password wajib diisi.',
      'password.min' => 'Password minimal 8 karakter.',
      'password.regex' => 'Password harus terdiri dari huruf kapital, huruf kecil, dan angka.',
    ];

    // Validasi input
    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }

    // Buat user baru
    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'role_id' => 2,
      'password' => Hash::make($request->password),
    ]);

    Alert::success('Success', 'Anda Berhasil Register');
    return redirect()->route('login');
  }


  public function logout(Request $request)
  {
    Auth::logout();

    // Hapus session dan redirect ke halaman login atau ke halaman yang diinginkan
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    Alert::info('Sucess', 'Terima sudah berkunjung!!!!.');
    return redirect()->route('login');
  }

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }
}
