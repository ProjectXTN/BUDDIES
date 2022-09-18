<?php

namespace App\Controller;

use App\Entity\Group;
use App\Repository\GroupRepository;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupController extends AbstractController
{
    #[Route('/group', name: 'app_group')]
    public function index(GroupRepository $groupRepository): Response
    {
        return $this->render('group/index2.html.twig', [
            'controller_name' => 'GroupController',
            // il faut faire un boucle pour utilise le findAll est recupere touts les group
            'group' => $groupRepository->findAll()
        ]);
    }


    //   ***************  il faut faire la route por prend le ID du group ************


    #[Route('/community/page', name: 'app_group_details', methods: ['GET'])]
    public function details(GroupRepository $groupRepository, PublicationRepository $publicationRepository): Response
    {
       
/*         $tabFriends = [];
        foreach($this->getUser()->getFriends() as $row){
            array_push($tabFriends, $row->getId());
        }

        $showButtonFriend = true;
        if(in_array($user->getId(), $tabFriends)){
            $showButtonFriend = false;
        }  */
        

        return $this->render('group/index.html.twig', [
            'controller_name' => 'CommunityPageController',
            'group' => $groupRepository->findOneById(3),
            'publication' => $publicationRepository->findOneById(9)
        ]);
    }
}
