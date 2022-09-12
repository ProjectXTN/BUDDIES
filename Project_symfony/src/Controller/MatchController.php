<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatchController extends AbstractController
{
    #[Route('/match', name: 'app_match')]
    public function index(UserRepository $userRepository): Response
    {           
        //Recup du user connecte
        $myInformation = $this->getUser();
        //dd($getUserInfo);

        //recupperer la liste de tous les users
        $getAllUser = $userRepository->findAll();
        //dd($getAllUser);


        $tabMyIdForm = [];
        foreach($myInformation->getForm() as $rowForm){
            $tabMyIdForm[] = $rowForm->getId();
        }


        foreach($getAllUser as $otherUsers){

            $increment = 0;
            
            if($otherUsers->getId() != $myInformation->getId()){
                foreach($otherUsers->getForm() as $formOtherUser){
                    
                   if(in_array($formOtherUser->getId(), $tabMyIdForm)){
                        $increment++;
                    }

                }
            }

            $tabOtherUser[$otherUsers->getId()] = $increment;
            
        }


//dd($tabUserInterets);


        //Sorts array in place in descending order, such that its keys maintain their correlation with the values they are associated with. 
        arsort($tabOtherUser);
     
        dd($tabOtherUser);
        return $this->render('match/index.html.twig', [
            'controller_name' => 'MatchController',
        ]);
    }


}
