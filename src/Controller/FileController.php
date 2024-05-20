<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FileController extends AbstractController
{
    /**
     * @Route("/fichiers/{filename}", name="file_download")
     */
    #[Route('/fichiers/{filename}', name: 'file')]
    public function download(string $filename): Response
    {
        $filePath = $this->getParameter('kernel.project_dir') . '/public/fichiers/' . $filename;

        if (!file_exists($filePath)) {
            throw $this->createNotFoundException('The file does not exist');
        }

        return $this->file($filePath);
    }
}