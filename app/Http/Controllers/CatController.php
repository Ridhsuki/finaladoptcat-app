<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CatController extends Controller
{
    public function index(Request $request)
    {

        $cats = DB::table('cats')
            ->join('adopsi_posts', 'cats.id', '=', 'adopsi_posts.cat_id')
            ->where('adopsi_posts.status', 'approved') // Postingan yang sudah disetujui admin
            ->select('cats.*') // Memilih kolom dari tabel cats saja
            ->get();
        return view('adopt', compact('cats'));
    }
    public function show($id)
    {
        $cat = Cat::findOrFail($id);

        return view('adopt-details', compact('cat'));
    }
    public function create()
    {
        return view('create-adopt');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_cat' => 'required|string|max:255',
            'age' => 'required|integer',
            'gender' => 'required|in:male,female',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'photo_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = $request->file('photo_url')->store('cat_photos', 'public');

        // Save to database
        Cat::create([
            'user_id' => Auth::id(),
            'name_cat' => $validated['name_cat'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'location' => $validated['location'],
            'description' => $validated['description'],
            'photo_url' => $photoPath,
            'status' => 'available',
        ]);

        return redirect()->route('adopt.index')->with('success', 'Pengajuan adopsi berhasil dibuat! Tunggu persetujuan admin.');
    }
}
