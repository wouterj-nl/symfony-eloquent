<?php

namespace App\Controller;

use App\Model\Talk;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TalkController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('talk/index.html.twig', [
            'accepted_talks' => Talk::where('accepted', true)->get(),
            'proposed_talks' => Talk::where('accepted', false)->get(),
        ]);
    }

    #[Route('/talk/{id}/accept', methods: 'POST', name: 'talk_accept')]
    public function accept(int $id): Response
    {
        $talk = Talk::find($id);
        $talk->accepted = true;
        $talk->save();

        return $this->redirectToRoute('home');
    }
}
