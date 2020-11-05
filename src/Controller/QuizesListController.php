<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizesListController extends AbstractController
{
    /**
     * @Route("/quizzes", name="quizzes")
     */
    public function index(): Response
    {
        return $this->render('quizes_list/index.html.twig');
    }
}
