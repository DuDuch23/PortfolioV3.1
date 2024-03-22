<?php

namespace App\Controller\Admin;

use App\Repository\AdminRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/admins', name: 'admin_admins_')]
class UserAdminController extends AbstractController
{
    #[Route(path: '/', name: 'liste')]
    public function index(AdminRepository $adminRepository, UserRepository $userRepository): Response
    {
        $admins = $adminRepository->findAll();

        $users = $userRepository->findAll();

        return $this->render('admin/user_admin/index.html.twig', [
            'admins' => $admins,
            'users' => $users,
        ]);
    }
}
