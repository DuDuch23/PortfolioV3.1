<?php

namespace App\Controller\Admin;

use App\Entity\Techno;
use App\Form\TechnoType;
use App\Repository\TechnoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/technos', name: 'admin_technos_')]
class TechnoController extends AbstractController
{
    #[Route(path: '/', name: 'liste')]
    public function liste(TechnoRepository $technoRepository): Response
    {
        $technos = $technoRepository->findAll();

        return $this->render('admin/technos/index.html.twig', [
            'technos' => $technos,
        ]);
    }

    #[Route(path: '/add', name: 'add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $techno = new Techno();
        $form = $this->createForm(TechnoType::class, $techno);
        $form->createView()->vars['attr']['class'] = 'w-3/5';
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager->persist($techno);
            $entityManager->flush();

            return $this->redirectToRoute('admin_technos_liste', [
                'id' => $techno->getId(),
            ]);
        }else{
            $this->addFlash('error', 'Le formulaire contient des erreurs');
        }

        return $this->render('admin/technos/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route(path: '/edit/{id}', name: 'edit')]
    public function edit(Request $request, Techno $techno, EntityManagerInterface $entityManagerInterface): Response
    {
        $form = $this->createForm(TechnoType::class, $techno, [
            'method' => 'POST',
        ]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_technos_liste', [
                'id' => $techno->getId(),
            ]);
        }else{
            $this->addFlash('error', 'Le formulaire contient des erreurs');
        }

        $view = $form->createView();
        $view->vars['attr']['class'] = 'w-8/12 flex justify-center';

        return $this->render('admin/technos/edit.html.twig', [
            'form' => $view,
            'techno' => $techno,
        ]);
    }

    #[Route(path: '/delete/{id}', name: 'delete', methods: 'POST' )]
    public function delete(Request $request, Techno $techno, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $token = $request->request->get('csrf_token');

        if(!$this->isCsrfTokenValid('delete-techno', $token))
        {
            throw $this->createAccessDeniedException();
        }
        try{
            $entityManager->remove($techno);
            $entityManager->flush();
        }catch (\Exception $e)
        {
            $logger->error($e->getMessage());
            $this->addFlash('error', 'La techno n\'a pas pû être supprimé');
        }

        return $this->redirectToRoute('admin_technos_liste');
    }
}
