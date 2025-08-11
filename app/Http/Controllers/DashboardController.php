<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Cek peran (role) dari user yang sedang login
        if ($user->role === 'admin') {
            // Pastikan panggilannya seperti ini, tanpa .blade.php
            return view('dashboards.admin');
        } elseif ($user->role === 'staff') {
            // Jika staff, tampilkan view dashboard staff
            return view('staff.blade');
        }

        // Default fallback jika tidak punya role
        return redirect('/');
    }
}
