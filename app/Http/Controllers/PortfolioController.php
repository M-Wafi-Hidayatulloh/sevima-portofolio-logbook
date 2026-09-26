<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
   // Menampilkan halaman portofolio publik (/p/{username}) untuk HRD/Mentor
    public function show($username)
    {
        $user = User::where('username', $username)->with('projects')->firstOrFail();

        return view('portfolio.show', compact('user'));
    }
}
