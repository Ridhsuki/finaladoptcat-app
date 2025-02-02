<?php

namespace App\Http\Controllers;

use App\Models\AdopsiPost;
use App\Models\Notification;
use App\Models\Post;

class NotificationController extends Controller
{

    public function index()
    {
        $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->get();

        return view('notif', data: compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = Notification::where('user_id', auth()->id())->findOrFail($id);
        $notification->is_read = 1;
        $notification->save();

        return redirect()->back()->with('message', 'Notification marked as read.');
    }
    public function approvePost($postId)
    {
        $post = AdopsiPost::findOrFail($postId);
        $post->status = 'approved';
        $post->save();

        // Tambahkan notifikasi untuk pemilik posting
        Notification::create([
            'user_id' => $post->user_id, // Pemilik posting
            'type' => 'approval',
            'message' => 'Your post "' . $post->cat->name_cat . '" has been approved by the admin.',
            'is_read' => 0,
        ]);

        return redirect()->back()->with('message', 'Post approved successfully.');
    }
}
