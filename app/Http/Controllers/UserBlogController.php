<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdopsiPost;
use App\Models\Cat;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class UserBlogController extends Controller
{
    public function index()
    {
        // $adopsiPosts = AdopsiPost::where('user_id', Auth::id())->get();
        $adopsiPosts = AdopsiPost::where('user_id', Auth::id())
        ->whereIn('status', ['pending', 'approved']) // Pilih status yang ingin ditampilkan
        ->get();
        $blogPosts = Post::where('user_id', Auth::id())->get();
        // @dd($adopsiPosts);

        return view('user-posts', compact('adopsiPosts', 'blogPosts'));
    }

    public function edit($id)
    {
        // Ambil data blog berdasarkan ID
        $post = Post::findOrFail($id);

        // Pastikan hanya pemilik blog yang bisa mengedit
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('edit-blog', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Pastikan hanya pemilik blog yang bisa mengedit
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'blog_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses konten deskripsi untuk mengolah gambar base64
        $description = $request->input('description');

        // Ambil semua tag <img> dari konten menggunakan regex
        preg_match_all('/<img[^>]+src="([^">]+)"/i', $description, $matches);

        foreach ($matches[1] as $key => $src) {
            if (strpos($src, 'data:image') === 0) {
                // Decode base64 image
                $imageData = explode(',', $src);
                $image = base64_decode($imageData[1]);
                $imageName = 'blog/' . uniqid() . '.png';
                file_put_contents(public_path($imageName), $image);

                // Replace the base64 src with the URL
                $description = str_replace($src, asset($imageName), $description);
            }
        }

        // Proses upload gambar thumbnail jika ada
        if ($request->hasFile('blog_image')) {
            $imagePath = $request->file('blog_image')->store('blog_images', 'public');
            $imageUrl = asset('storage/' . $imagePath);

            // Hapus gambar lama jika ada
            if ($post->blog_image) {
                $oldImagePath = public_path(parse_url($post->blog_image, PHP_URL_PATH));
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $post->blog_image = $imageUrl;
        }

        // Update data blog
        $post->update([
            'title' => $validated['title'],
            'content' => $description,
        ]);

        return redirect('/blogs')->with('success', 'Blog updated successfully.');
    }


    public function destroy($id)
    {
        $post = AdopsiPost::find($id) ?? Post::find($id);

        if (!$post || $post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();

        return redirect()->route('user.posts')->with('success', 'Post deleted successfully.');
    }
}
