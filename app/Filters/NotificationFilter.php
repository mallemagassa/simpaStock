<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\Notification;

class NotificationFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Récupération des notifications
        $notificationModel = new Notification();
        $notificationsNoRead = $notificationModel->where('is_read', 0)->findAll();
        $notifications = $notificationModel->where('user_id', auth()->id())->findAll();

        // Partager les notifications globalement
        service('renderer')->setData(
            [
                'notificationsNoRead' => $notificationsNoRead,
                'notifications' => $notifications,
            ], 'raw');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Après l'exécution du contrôleur (si nécessaire)
    }
}
