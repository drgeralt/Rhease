<?php

require_once BASE_PATH . '/app/Core/Controller.php';
require_once BASE_PATH . '/app/Models/InternalCommunicationModel.php';

class InternalCommunicationController
{
    public function index()
    {
        $model = new InternalCommunicationModel();
        $messages = $model->getMessages();
        require_once BASE_PATH . '/app/Views/communication/index.php';
    }

    public function sendMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = $_POST['content'];

            $model = new InternalCommunicationModel();

            $data = [
                'sender_id' => 1,
                'receiver_id' => 1,
                'content' => $content
            ];

            $model->sendMessage($data);

            header('Location: /comunicacao');
            exit;
        }
    }
}