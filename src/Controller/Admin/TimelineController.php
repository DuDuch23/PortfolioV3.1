<?php

namespace App\Controller\Admin;

use App\Entity\Timeline;
use App\Form\TimelineType;
use App\Repository\TimelineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/timelines', name: 'admin_timelines_')]
class TimelineController extends AbstractController
{
    #[Route(path: '/', name: 'liste')]
    public function liste(TimelineRepository $timelineRepository): Response
    {
        $timelines = $timelineRepository->findAll();

        return $this->render('admin/timeline/index.html.twig', [
            'timelines' => $timelines,
        ]);
    }

    #[Route(path: '/add', name: 'add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $timeline = new Timeline();
        $form = $this->createForm(Timeline::class);
        $form->createView()->vars['attr']['class'] = 'w-3/5';
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager->persist($timeline);
            $entityManager->flush();

            return $this->redirectToRoute('admin_timelines_liste', [
                'id' => $timeline->getId(),
            ]);
        }else{
            $this->addFlash('error', 'Le formulaire contient des erreurs');
        }

        return $this->render('admin/timelines/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route(path: '/edit/{id}', name: 'edit')]
    public function edit(Request $request, Timeline $timeline, EntityManagerInterface $entityManagerInterface): Response
    {
        $form = $this->createForm(TimelineType::class, $timeline, [
            'method' => 'POST',
        ]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManagerInterface->flush();

            return $this->redirectToRoute('admin_projets_liste', [
                'id' => $timeline->getId(),
            ]);
        }else{
            $this->addFlash('error', 'Le formulaire contient des erreurs');
        }

        $view = $form->createView();
        $view->vars['attr']['class'] = 'w-8/12 flex justify-center';

        return $this->render('admin/timelines/edit.html.twig', [
            'form' => $view,
            'timeline' => $timeline,
        ]);
    }
}
