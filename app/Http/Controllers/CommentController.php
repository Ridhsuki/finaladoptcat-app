<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments;

        return view('blog-details', data: compact('post', 'comments'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string|max:555',
        ]);
        Comment::create([
            'post_id' => $validated['post_id'],
            'user_id' => Auth::id(),
            'content' => $validated['content'],
        ]);

        $post = Post::findOrFail($validated['post_id']);

        // Tambahkan notifikasi untuk pemilik postingan
        if ($post->user_id !== Auth::id()) { // Pastikan tidak membuat notifikasi untuk diri sendiri
            Notification::create([
                'user_id' => $post->user_id, // Pemilik postingan
                'type' => 'comment',
                'message' => 'Your post "' . $post->title . '" was commented on by ' . Auth::user()->name . '.',
                'is_read' => 0,
            ]);

        }

        return redirect()->back()->with('success', 'Comment added succesfully');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        // Pastikan user hanya bisa mengedit komentar mereka sendiri (jika ada sistem login)
        if (Auth::id() !== $comment->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:555',
        ]);

        $comment = Comment::findOrFail($id);

        // Pastikan user hanya bisa mengedit komentar mereka sendiri 
        if (Auth::id() !== $comment->user_id) {
            abort(403, 'Unauthorized action.');
        };

        $comment->update([
            'content' => $validated['content'],
        ]);

        return redirect()->back()->with('success', 'Comment updated succesfully');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // Pastikan user hanya bisa menghapus komentar mereka sendiri
        if (Auth::id() !== $comment->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
