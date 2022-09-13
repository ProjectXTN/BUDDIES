<?php

namespace App\Controller;

use App\Entity\ActivitieUser;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Form\RegistrationStep2;
use App\Form\RegistrationStep3;
use App\Form\RegistrationStep4;
use App\Form\RegistrationStep5;
use App\Form\RegistrationStep6;
use App\Form\RegistrationStep7;
use App\Form\RegistrationStep8;
use App\Repository\ActivitieRepository;
use App\Repository\ActivitieUserRepository;
use App\Repository\FormRepository;
use App\Repository\UserRepository;
use App\Security\AppAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegistrationController extends AbstractController
{ //Route to creation compte EMAIL
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, RequestStack $requestStack, UserAuthenticatorInterface $userAuthenticator, AppAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $session = $requestStack->getSession();
            $session->set('user', $user);
            
            //redirection
            return $this->redirectToRoute('app_register_step2', [], Response::HTTP_SEE_OTHER);

        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
    //Route to creation compte step2 Password
    #[Route('/step2', name: 'app_register_step2')]
    public function step2(Request $request, RequestStack $requestStack, UserPasswordHasherInterface $userPasswordHasher): Response
    {

        $session = $requestStack->getSession();

        $user = $session->get('user');

        $form = $this->createForm(RegistrationStep2::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $session->set('user', $user);
            
            //redirection
            return $this->redirectToRoute('app_register_step3', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('registration/step2.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
    //Route to creation compte step3 firstName/pseudo
    #[Route('/step3', name: 'app_register_step3')]
    public function step3(Request $request, RequestStack $requestStack): Response
    {

        $session = $requestStack->getSession();

        $user = $session->get('user');

        $form = $this->createForm(RegistrationStep3::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //dd($user);
            $user->setFirstName(
                    $form->get('firstName')->getData()
            );

            $session->set('user', $user);
            
            //redirection
            return $this->redirectToRoute('app_register_step4', [], Response::HTTP_SEE_OTHER);

        }
        return $this->render('registration/step3.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
        //Route to creation compte step4 date naissance
     #[Route('/step4', name: 'app_register_step4')]
    public function step4(Request $request, RequestStack $requestStack): Response
    {

        $session = $requestStack->getSession();

        $user = $session->get('user');
        $form = $this->createForm(RegistrationStep4::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //dd($user);
            $user->setBirthDate($form->get('birthDate')->getData())
            ;

            $session->set('user', $user);
            
            //redirection
            return $this->redirectToRoute('app_register_step5', [], Response::HTTP_SEE_OTHER);

        }

        return $this->render('registration/step4.html.twig', [
            'registrationForm' => $form->createView(),
        ]); 
    }
         //Route to creation compte step5 genre
    #[Route('/step5', name: 'app_register_step5')]
    public function step5(Request $request, RequestStack $requestStack): Response
    {

        $session = $requestStack->getSession();

        $user = $session->get('user');
        $form = $this->createForm(RegistrationStep5::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //dd($user);
            $user->setGenre(
                $form->get('genre')->getData())
            ;

            $session->set('user', $user);
            
            //redirection
            return $this->redirectToRoute('app_register_step6', [], Response::HTTP_SEE_OTHER);

        }

        return $this->render('registration/step5.html.twig', [
            'registrationForm' => $form->createView(),
        ]); 
    }


        //Route to creation compte step6 ou habites vous
    #[Route('/step6', name: 'app_register_step6')]
    public function step6(Request $request, RequestStack $requestStack): Response
    {

        $session = $requestStack->getSession();

        $user = $session->get('user');
        $form = $this->createForm(RegistrationStep6::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //dd($user);
            $user->setGenre(
                $form->get('city')->getData())
            ;

            $session->set('user', $user);
            
            //redirection
            return $this->redirectToRoute('app_register_step7', [], Response::HTTP_SEE_OTHER);

        }

        return $this->render('registration/step6.html.twig', [
            'registrationForm' => $form->createView(),
        ]); 
    } 

    //Route to creation compte step7 langue/nationalité
    #[Route('/step7', name: 'app_register_step7')]
    public function step7(Request $request, RequestStack $requestStack): Response
    {
        $session = $requestStack->getSession();
        $user = $session->get('user');              
        
        $form = $this->createForm(RegistrationStep7::class, $user);

        if (isset($request->get('registration_step7')["language"])) {

            $language = $request->get('registration_step7')["language"];

            $tab = ['', '2', '3'];
            $i = 0;
            foreach($language as $rowLanguage){
                $user->{'setLanguage'.$tab[$i]}($rowLanguage);
                $i++;
            }
            
            $session->set('user', $user);
            
            //redirection
            return $this->redirectToRoute('app_quiz', [], Response::HTTP_SEE_OTHER);

        }

        return $this->render('registration/step7.html.twig', [
            'registrationForm' => $form->createView(),
        ]); 
    } 

    #[Route('/quiz', name: 'app_quiz')]
    public function stepOne( ActivitieRepository $activitieRepository  ): Response
    {
        $form = $activitieRepository->findByStep(1);
        return $this->render('registration/step.html.twig', [
            'form' => $form,
            'step1' => true,
            'step2' => false,
            'step3' => false,
            'step4' => false
        ]);
    }

    #[Route('/quiz/step2', name: 'app_quiz_2')]
    public function stepTwo(Request $request, RequestStack $requestStack, ActivitieUserRepository $activitieUserRepository, ActivitieRepository $activitieRepository): Response
    {

        $session = $requestStack->getSession();
        $user = $session->get('user');       

        //traitement du form1 ( Recupere les choix du step 1)
        foreach($request->get('valueCheckbox') as $row){
            $activity = $activitieRepository->findOneById($row);
            $activityUser = new ActivitieUser();
            $activityUser->setActivitie($activity);
            $activityUser->setUser($user);
            $activityUser->setIsActivitie(false);

            $activitieUserRepository->add($activityUser);

            $user->addActivitieUser($activityUser);
        }

        $session->set('user', $user);


        $form = $activitieRepository->findByStep(2);
        return $this->render('registration/step.html.twig', [
            'form' => $form,
            'step2' => true,
            'step1' => false,
            'step3' => false,
            'step4' => false
        ]);
    }

    #[Route('/quiz/step3', name: 'app_quiz_3')]
    public function stepThree(Request $request, RequestStack $requestStack ,ActivitieUserRepository $activitieUserRepository, ActivitieRepository $activitieRepository): Response
    {

        $session = $requestStack->getSession();
        $user = $session->get('user');      
        
        foreach($request->get('valueCheckbox') as $row){
            $activity = $activitieRepository->findOneById($row);
            $activityUser = new ActivitieUser();
            $activityUser->setActivitie($activity);
            $activityUser->setUser($user);
            $activityUser->setIsActivitie(true);

            $activitieUserRepository->add($activityUser);

            $user->addActivitieUser($activityUser);
        }

        $session->set('user', $user);

        $form = $activitieRepository->findByStep(3);
        return $this->render('registration/step.html.twig', [
            'form' => $form,
            'step1' => false,
            'step2' => false,
            'step3' => true,
            'step4' => false
           
        ]);
    }

    #[Route('/step8', name: 'app_register_step8')]
    public function step8(Request $request, RequestStack $requestStack, EntityManagerInterface $entityManagerInterface): Response
    {
    
        $session = $requestStack->getSession();
    
        $user = $session->get('user');
        $form = $this->createForm(RegistrationStep8::class, $user);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            //dd($user);
            $user->setPicture(
                $form->get('Picture')->getData())
            ;
    
            $session->set('user', $user);
            $entityManagerInterface->persist($user);
            $entityManagerInterface->flush();
            
            //redirection
            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
    
        }
    
        return $this->render('registration/step8.html.twig', [
            'registrationForm' => $form->createView(),
        ]); 
    }

    

}

/* // encode the plain password
$user->setPassword(
    $userPasswordHasher->hashPassword(
        $user,
        $form->get('plainPassword')->getData()
    )
);

$entityManager->persist($user);
$entityManager->flush();
// do anything else you need here, like send an email

return $userAuthenticator->authenticateUser(
    $user,
    $authenticator,
    $request
); */



