<?php

namespace App\Controller;

use App\Repository\FormRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

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
            'step4' => false
        ]);
    }

    #[Route('/quiz/step2', name: 'app_quiz_2')]
    public function stepTwo(Request $request, FormRepository $formRepository, EntityManagerInterface $entityManagerInterface): Response
    {
        $user = $this->getUser();
        //traitement du form1 ( Recupere les choix du step 1)
        foreach($request->get('valueCheckbox') as $row){
            $form = $formRepository->findOneById($row);
            $user->addForm($form);
        }

        //persist (Previent qu'il faut enregistrer les choix)
        $entityManagerInterface->persist($user);

        //flush ( il excute l'enregistement)
        $entityManagerInterface->flush();


        $form = $formRepository->findByStep(2);
        return $this->render('quiz/step.html.twig', [
            'form' => $form,
            'step2' => true,
            'step1' => false,
            'step3' => false,
            'step4' => false
        ]);
    }

    #[Route('/quiz/step3', name: 'app_quiz_3')]
    public function stepThree(Request $request ,FormRepository $formRepository, EntityManagerInterface $entityManagerInterface): Response
    {

        $user = $this->getUser();
        
        foreach($request->get('valueCheckbox') as $row){
            $form = $formRepository->findOneById($row);
            $user->addForm($form);
        }

        $entityManagerInterface->persist($user);

        
        $entityManagerInterface->flush();



        $form = $formRepository->findByStep(3);
        return $this->render('quiz/step.html.twig', [
            'form' => $form,
            'step1' => false,
            'step2' => false,
            'step3' => true,
            'step4' => false
           
        ]);
    }

    #[Route('/quiz/step4', name: 'app_quiz_4')]
    public function stepFour(Request $request ,FormRepository $formRepository, EntityManagerInterface $entityManagerInterface): Response
    {

        $user = $this->getUser();
        
        foreach($request->get('valueCheckbox') as $row){
            $form = $formRepository->findOneById($row);
            $user->addForm($form);
        }

        $entityManagerInterface->persist($user);

        
        $entityManagerInterface->flush();


        $form = $formRepository->findByStep(4);
        return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
            
    }
}
