<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use App\Form\ProjetType;
use App\Repository\ProjetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

    #[Route(path: '/add', name: 'add')]
    public function addProjet(Request $request, EntityManagerInterface $entityManager): Response
    {
        $projet = new Projet();
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager->persist($projet);
            $entityManager->flush();

            return $this->redirectToRoute('admin_projets_liste', [
                'id' => $projet->getId(),
            ]);
        }else{
            $this->addFlash('error', 'Le formulaire contient des erreurs');
        }

        return $this->render('admin/projets/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route(path: '/edit/{id}', name: 'edit')]
    public function editProjet(Request $request, Projet $projet, EntityManagerInterface $entityManagerInterface): Response
    {
        $form = $this->createForm(ProjetType::class, $projet, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_projets_liste', [
                'id' => $projet->getId(),
            ]);
        }else{
            $this->addFlash('error', 'Le formulaire contient des erreurs');
        }

        return $this->render('admin/projets/edit.html.twig', [
            'form' => $form,
            'projet' => $projet,
        ]);
    }

    #[Route(path: '/delete/{id}', name: 'delete', methods: 'POST' )]
    public function deleteProjet(Request $request, Projet $projet, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $token = $request->request->get('csrf_token');

        if(!$this->isCsrfTokenValid('delete-projet', $token))
        {
            throw $this->createAccessDeniedException();
        }
        try{
            $entityManager->remove($projet);
            $entityManager->flush();
        }catch (\Exception $e)
        {
            $logger->error($e->getMessage());
            $this->addFlash('error', 'Le projet n\'a pas pû être supprimé');
        }

        return $this->redirectToRoute('admin_projets_liste');
    }
}
