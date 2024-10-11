<?php

namespace App\Listeners;

use App\Models\Notification;

class NotificationListener
{
    public static function handle($event)
    {
        $notificationModel = new Notification();
        
        $notificationModel->insert([
            'user_id' => $event['user_id'],
            'message' => $event['message'],
        ]);
    }
}
