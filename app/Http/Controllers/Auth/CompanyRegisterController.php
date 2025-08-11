<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyRegisterController extends Controller
{
    // Method untuk menampilkan view/halaman form
    public function showRegistrationForm()
    {
        // 1. Ambil semua data sektor dari database
        $sectors = Sector::all();

        // 2. Kirim data $sectors ke view
        return view('auth.company-register', compact('sectors'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'sector_id' => 'required|exists:sectors,id',
            'admin_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $company = Company::create([
            'name' => $request->company_name,
            'sector_id' => $request->sector_id,
        ]);

        User::create([
            'company_id' => $company->id,
            'name' => $request->admin_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect('/login')->with('status', 'Pendaftaran perusahaan berhasil! Silakan login.');
    }
}
