<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminUsersController extends AbstractController
{
    /**
     * @Route("/admin/users", name="admin_users")
     */
    public function index(UserRepository $userRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $users=$userRepository->findAll();
        $result=$paginator->paginate(
            $users,
            $request->query->getInt('page',1),
            $request->query->getInt('limit',10)
        );
        return $this->render('admin_users/index.html.twig', [
            'users' => $result,
        ]);
    }
}
