<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    public function redirectTo() {
        $role = Auth::user()->status; 
        switch ($role) {
          case 'admin':
            return '/admin/dashboard';
            break;
          case 'mahasiswa':
            return '/mahasiswa/dashboard';
            break; 
          case 'dosen':
            return '/dosen/dashboard';
            break; 
          case 'prodi':
            return '/prodi/dashboard';
            break;
      
          default:
            return '/'; 
          break;
        }
      }
  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }
}
