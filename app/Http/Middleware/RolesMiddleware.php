<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolesMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, ...$roles) : Response
  {
    $userLogin = Auth::user();

    foreach ($roles as $role) {
      if ($userLogin && $userLogin->role_id == $role) {
        return $next($request);
      }
    }

    abort(403, 'Anda Tidak Memiliki Hak Mengakses Halaman Tersebut!!!');
  }
}
