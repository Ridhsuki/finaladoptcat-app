<?php

namespace App\Http\Controllers;

use App\Models\AdopsiPost;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdopsiPostController extends Controller
{
    public function edit($id)
    {
        $adoption = AdopsiPost::with('cat')->findOrFail($id);
        // dd($adoption);

        // Pastikan hanya pemilik postingan yang dapat mengedit
        if ($adoption->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('edit-adopt', compact('adoption'));
    }
    public function update(Request $request, $id)
    {
        $adoption = AdopsiPost::findOrFail($id);

        // Pastikan hanya pemilik postingan yang dapat mengedit
        if ($adoption->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi input
        $validated = $request->validate([
            'name_cat' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:male,female',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'photo_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses upload foto kucing jika ada
        if ($request->hasFile('photo_url')) {
            $photoPath = $request->file('photo_url')->store('cat_photos', 'public');
            $photoUrl = asset('storage/' . $photoPath);

            // Hapus foto lama jika ada
            if ($adoption->cat->photo_url) {
                $oldPhotoPath = public_path(parse_url($adoption->cat->photo_url, PHP_URL_PATH));
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            // Update photo_url pada model Cat yang terkait dengan AdopsiPost
            $adoption->cat->photo_url = $photoUrl;
            $adoption->cat->save(); // Simpan perubahan pada Cat
        }

        // Update data AdopsiPost
        $adoption->update([
            'name_cat' => $validated['name_cat'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'location' => $validated['location'],
            'description' => $validated['description'],
        ]);

        return 
        // redirect()->route('adopt.index')
        back()->with('success', 'Adopsi berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $adoption = AdopsiPost::findOrFail($id);

        // Pastikan hanya pemilik postingan yang dapat menghapus
        if ($adoption->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus foto dari storage jika ada
        if ($adoption->photo_url) {
            $photoPath = public_path(parse_url($adoption->photo_url, PHP_URL_PATH));
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $adoption->delete();

        return redirect()->back()->with('success', 'Adoption post deleted successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|in:available,pending,adopted', // Validasi status untuk kolom cats
        ]);

        $post = AdopsiPost::findOrFail($id);

        // Pastikan hanya user yang memiliki post yang bisa memperbarui
        if ($post->user_id !== Auth::id()) {
            abort(403); // Hanya user yang memiliki postingan yang bisa mengubah status
        }

        // Cari kucing berdasarkan ID yang terhubung dengan post
        $cat = Cat::findOrFail($post->cat_id);

        // Update status di tabel cats (status adopsi kucing)
        $cat->status = $request->input('status');
        $cat->save();

        return redirect()->back()->with('message', 'Status kucing diperbarui dengan sukses.');
    }

    public function sendtoWhatsapp($catId)
    {
        // Ambil data kucing berdasarkan ID
        $cat = Cat::findOrFail($catId);

        // Data dinamis untuk pesan
        $catName = $cat->name_cat;
        $catLocation = $cat->location ?? 'Unknown';
        $catGender = $cat->gender ?? 'Unknown';
        $postedBy = $cat->user->name ?? 'Admin';

        // Data pengirim (nama pengguna yang mengirimkan pesan, misal dari autentikasi)
        $senderName = auth()->user()->name;

        // Template pesan
        $message = "*Notification from FinalAdoptCat*\n\n"
            . "Hey hey!\n\n"
            . "I’m super interested in the kitty you posted!\n\n"
            . "Here’s some info about this cute little one looking for a new home:\n"
            . "______________\n"
            . "*Cat’s Name:* $catName\n"
            . "*Location:* $catLocation\n"
            . "*Gender:* $catGender\n"
            . "*Posted by:* $postedBy\n"
            . "______________\n\n"
            . "I’m really excited about the chance to give *$catName* a loving home full of snuggles and care!\n\n"
            . "Let’s chat more and figure out when we can meet up!\n\n"
            . "Thanks so much, and I really hope *$catName* finds a friend who will love them just as much!\n\n"
            . "Cheers,\n"
            . "*$senderName*"; // Nama pengirim sebagai pengganti "FinalAdoptCat Team"

        // Nomor WhatsApp tujuan (contoh dari data kucing)
        $phoneNumber = $cat->user->phone;

        // URL WhatsApp (tanpa encoding)
        $whatsappUrl = "https://wa.me/$phoneNumber?text=" . str_replace("\n", "%0A", $message);

        // Redirect user ke link WhatsApp
        return redirect($whatsappUrl);
    }
}
