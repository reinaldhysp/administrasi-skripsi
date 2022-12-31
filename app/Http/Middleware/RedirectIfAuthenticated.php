<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
          $role = Auth::user()->status; 
      
          switch ($role) {
            case 'admin':
               return redirect('/admin/dashboard');
               break;
            case 'mahasiswa':
               return redirect('/mahasiswa/dashboard');
               break; 
            case 'dosen':
               return redirect('/dosen/dashboard');
               break;
            case 'prodi':
               return redirect('/prodi/dashboard');
               break;
      
            default:
               return redirect('/'); 
               break;
          }
        }
        return $next($request);
      }
      
}
