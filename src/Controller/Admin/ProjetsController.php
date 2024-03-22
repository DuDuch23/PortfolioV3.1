<?php

namespace App\Controller\Admin;

use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/projets', name: 'admin_projets_')]
class ProjetsController extends AbstractController
{
    #[Route(path: '/', name: 'liste')]
    public function listProjets(ProjetRepository $projetRepository): Response
    {
        $projets = $projetRepository->findAll();

        return $this->render('admin/projets/index.html.twig', [
            'projets' => $projets,
        ]);
    }
}
