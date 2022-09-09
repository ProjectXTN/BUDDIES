<?php

namespace App\Controller;

use App\Repository\FormRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuizController extends AbstractController
{
    #[Route('/quiz', name: 'app_quiz')]
    public function stepOne(FormRepository $formRepository): Response
    {
        $form = $formRepository->findByStep(1);
        return $this->render('quiz/step.html.twig', [
            'form' => $form,
            'step1' => true,
            'step2' => false,
            'step3' => false,
        ]);
    }

    

    #[Route('/quiz/step2', name: 'app_quiz_2')]
    public function stepTwo(FormRepository $formRepository): Response
    {
        //traitement du form1


        $form = $formRepository->findByStep(2);
        return $this->render('quiz/step.html.twig', [
            'form' => $form,
            'step2' => true,
            'step1' => false,
            'step3' => false,
        ]);
    }

    #[Route('/quiz/step3', name: 'app_quiz_3')]
    public function stepThree(FormRepository $formRepository): Response
    {
        $form = $formRepository->findByStep(3);
        return $this->render('quiz/step.html.twig', [
            'form' => $form,
            'step1' => false,
            'step2' => false,
            'step3' => true,
           
        ]);
    }
}
