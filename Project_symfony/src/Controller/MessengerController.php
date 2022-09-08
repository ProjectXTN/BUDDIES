<?php

namespace App\Controller;

use App\Entity\Messenger;
use App\Form\MessengerType;
use App\Repository\MessengerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/messenger')]
class MessengerController extends AbstractController
{
    #[Route('/', name: 'app_messenger_index', methods: ['GET'])]
    public function index(MessengerRepository $messengerRepository): Response
    {
        return $this->render('messenger/index.html.twig', [
            'messengers' => $messengerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_messenger_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MessengerRepository $messengerRepository): Response
    {
        $messenger = new Messenger();
        $form = $this->createForm(MessengerType::class, $messenger);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $messengerRepository->add($messenger, true);

            return $this->redirectToRoute('app_messenger_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('messenger/new.html.twig', [
            'messenger' => $messenger,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_messenger_show', methods: ['GET'])]
    public function show(Messenger $messenger): Response
    {
        return $this->render('messenger/show.html.twig', [
            'messenger' => $messenger,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_messenger_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Messenger $messenger, MessengerRepository $messengerRepository): Response
    {
        $form = $this->createForm(MessengerType::class, $messenger);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $messengerRepository->add($messenger, true);

            return $this->redirectToRoute('app_messenger_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('messenger/edit.html.twig', [
            'messenger' => $messenger,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_messenger_delete', methods: ['POST'])]
    public function delete(Request $request, Messenger $messenger, MessengerRepository $messengerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$messenger->getId(), $request->request->get('_token'))) {
            $messengerRepository->remove($messenger, true);
        }

        return $this->redirectToRoute('app_messenger_index', [], Response::HTTP_SEE_OTHER);
    }
}
