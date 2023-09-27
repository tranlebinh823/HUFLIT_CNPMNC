<?php

namespace App\Http\View\Composer;

use Illuminate\View\View;
use App\Models\Notification;


class NotificationsComposer
{
    public function compose(View $view)
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        $view->with('notifications', $notifications);
    }
}
