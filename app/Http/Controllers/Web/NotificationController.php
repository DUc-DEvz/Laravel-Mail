<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        return view(
            'notifications.index',
            [
                'notifications' => auth()->user()->notifications,
                'unreadCount' => auth()->user()->notifications->count()
            ]
        );
    }

    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications->find($id);
        if ($notification) {
            $notification->markAsRead();
        }
        return redirect()->back()->with('success', 'Thông báo đã được đánh dấu là đã đọc!');
    }

    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back()->with('success', 'Tất cả thông báo đã được đánh dấu là đã đọc!');
    }
}
