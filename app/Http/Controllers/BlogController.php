<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        // Ambil semua data blog (atau tambahkan filter sesuai kebutuhan)
        $blogs = Post::where('type', 'blog')->with(['user', 'comments'])->get();

        // Kirim data ke blade
        return view('blogs', compact('blogs'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id); // Tampilkan detail blog tertentu
        return view('blog-details', [
            'post' => $post,
            'comments' => $post->comments,
        ]);
    }

    public function create()
    {
        return view('create-blog');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'blog_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // dd($validated);
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
        } else {
            $imageUrl = null;
        }

        Post::create([
            'user_id' => Auth::id(),
            'blog_image' => $imageUrl,
            'title' => $validated['title'],
            'content' => $description,
            'type' => 'blog',
        ]);


        return redirect('/blogs');
    }
}
