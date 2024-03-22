<?php

namespace App\Controller\Admin;

use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/messages', name: 'admin_messages_')]
class ContactController extends AbstractController
{
    #[Route(path: '/', name: 'liste')]
    public function listMessage(MessageRepository $messageRepository): Response
    {
        $messages = $messageRepository->findAll();

        return $this->render('admin/message/index.html.twig', [
            'messages' => $messages,
        ]);
    }
}
