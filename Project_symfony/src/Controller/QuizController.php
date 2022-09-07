<?php

namespace App\Controller;

use App\Repository\FormRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    #[Route('/quiz', name: 'app_quiz')]
    public function index(FormRepository $formRepository): Response
    {
        $form = $formRepository->findByStep(1);
        return $this->render('quiz/index.html.twig', [
            'controller_name' => 'QuizController',
        ]);
    }

    #[Route('/quiz', name: 'app_quiz')]
    public function index(FormRepository $formRepository): Response
    {
        $form = $formRepository->findByStep(1);
        return $this->render('quiz/index.html.twig', [
            'controller_name' => 'QuizController',
        ]);
    }

    #[Route('/quiz', name: 'app_quiz')]
    public function index(FormRepository $formRepository): Response
    {
        $form = $formRepository->findByStep(2);
        return $this->render('quiz/index.html.twig', [
            'controller_name' => 'QuizController',
        ]);
    }

    #[Route('/quiz', name: 'app_quiz')]
    public function index(FormRepository $formRepository): Response
    {
        $form = $formRepository->findByStep(3);
        return $this->render('quiz/index.html.twig', [
            'controller_name' => 'QuizController',
        ]);
    }
}
