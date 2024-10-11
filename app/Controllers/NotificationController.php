<?php 

namespace App\Controllers;

use App\Models\Notification;

class NotificationController extends BaseController
{
    public function markAllAsRead()
    {
        if ($this->request->isAJAX()) {
            $notificationModel = new Notification();


            $notificationModel->where('user_id', auth()->id())
                              ->where('is_read', 0)
                              ->set(['is_read' => 1])
                              ->update();

            return $this->response->setJSON(['success' => true]);
        }

        return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Invalid request']);
    }

    public function deleteNotification($id)
    {
        if ($this->request->isAJAX()) {
            $notificationModel = new Notification();

            if ($notificationModel->where('user_id', auth()->id())->where('id', $id)->delete()) {
                return $this->response->setJSON(['success' => true]);
            }

            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Erreur lors de la suppression']);
        }

        return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Requête non valide']);
    }
}
