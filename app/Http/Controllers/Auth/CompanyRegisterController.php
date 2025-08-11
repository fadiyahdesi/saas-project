<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Models\Sector; // 1. Tambahkan ini untuk menggunakan model Sector
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyRegisterController extends Controller
{
    /**
     * Menampilkan halaman form registrasi perusahaan.
     */
    public function showRegistrationForm()
    {
        // 2. Ambil semua data sektor dari database
        $sectors = Sector::all();
        // 3. Kirim data sektor ke view agar bisa dibuat dropdown
        return view('auth.company-register', compact('sectors'));
    }

    /**
     * Memproses data pendaftaran perusahaan baru.
     */
    public function register(Request $request)
    {
        // 4. Validasi data, termasuk sector_id
        $request->validate([
            'company_name' => 'required|string|max:255',
            'sector_id' => 'required|exists:sectors,id', // Validasi sector_id
            'admin_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 5. Buat Company baru dengan menyertakan sector_id
        $company = Company::create([
            'name' => $request->company_name,
            'sector_id' => $request->sector_id, // Simpan sector_id
        ]);

        // 6. Buat User Admin pertama untuk company tersebut
        User::create([
            'company_id' => $company->id,
            'name' => $request->admin_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);
        
        // 7. Arahkan ke halaman login dengan pesan sukses
        return redirect('/login')->with('status', 'Pendaftaran perusahaan berhasil! Silakan login.');
    }
}