<?php

use App\Models\User;
use App\Models\Project;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

// Halaman Utama / Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Area Khusus User Terautentikasi (Siswa & Guru)
Route::middleware(['auth', 'verified'])->group(function () {

    // Route Dashboard (Otomatis membedakan Siswa & Guru)
    Route::get('/dashboard', function () {
        $user = auth()->user();

        // Jika yang login memiliki role 'guru'
        if ($user->role === 'guru') {
            $students = User::where('role', 'siswa')->with('projects')->get();
            $totalProjects = Project::count();
            return view('dashboard-guru', compact('students', 'totalProjects'));
        }

        // Jika yang login adalah 'siswa'
        $projects = $user->projects()->latest()->get();
        return view('dashboard', compact('projects'));
    })->name('dashboard');

    // CRUD Project Logbook
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Publik Portofolio (Bisa diakses siapa saja / HRD)
Route::get('/p/{username}', [PortfolioController::class, 'show'])->name('portfolio.show');

require __DIR__.'/auth.php';