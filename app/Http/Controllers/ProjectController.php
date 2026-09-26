<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Menyimpan proyek logbook baru dari dashboard siswa
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            'tech_stack' => 'required|string|max:255',
            'github_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
        ]);

        Auth::user()->projects()->create($validated);

        return redirect()->back()->with('success', 'Proyek logbook berhasil ditambahkan!');
    }

    // Menghapus proyek milik siswa
    public function destroy(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        $project->delete();

        return redirect()->back()->with('success', 'Proyek berhasil dihapus!');
    }
}
