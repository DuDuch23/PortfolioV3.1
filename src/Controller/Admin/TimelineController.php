<?php

namespace App\Controller\Admin;

use App\Repository\TimelineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/timelines', name: 'admin_timelines_')]
class TimelineController extends AbstractController
{
    #[Route(path: '/', name: 'liste')]
    public function listTimeline(TimelineRepository $timelineRepository): Response
    {
        $timelines = $timelineRepository->findAll();

        return $this->render('admin/timeline/index.html.twig', [
            'timelines' => $timelines,
        ]);
    }
}
