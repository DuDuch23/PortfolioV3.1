<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\ContactType;
use App\Repository\ProjetRepository;
use App\Repository\TimelineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProjetRepository $projetRepository,
    TimelineRepository $timelineRepository,
    Request $request,
    EntityManagerInterface $entityManager): Response
    {
        $projets = $projetRepository->findAll();

        $timelines = $timelineRepository->findAll();

        $message = new Message();

        $form = $this->createForm(ContactType::class, $message);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            try{
                $entityManager->persist($message);
                $entityManager->flush();

                $this->addFlash('Erreur', 'Message envoyé');
            }
            catch(Exception $e){
                return $this->redirectToRoute('index', [
                    'erreur' => 'Erreur lors de l\'envoie du message.',
                ]);
            }
        }

        return $this->render('home/index.html.twig', [
            'projets' => $projets,
            'timelines' => $timelines,
            'form' => $form->createView(),
        ]);
    }
}
