<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/api/{searchTxt}', name: 'app_api')]
    public function searchBar($searchTxt, UserRepository $userRepository): JsonResponse
    {
        $list = $userRepository->findUserByFirstName($searchTxt);
        return new JsonResponse($list);
    }
}
