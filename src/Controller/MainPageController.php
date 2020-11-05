<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    /**
     * @Route("/", name="mainpage")
     */
    public function index(): Response
    {
        if ($this->getUser()) {
            if (in_array("ROLE_ADMIN",$this->getUser()->getRoles())) {
                return $this->redirectToRoute('admin');
            }
            return $this->redirectToRoute('quizzes');
        }
        return $this->render('home/index.html.twig');
    }
}
