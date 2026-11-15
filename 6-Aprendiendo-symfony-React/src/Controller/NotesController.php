<?php

namespace App\Controller;

use App\Repository\NotesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NotesController extends AbstractController
{
    #[Route('/notes', name: 'app_notes')]
    public function index(notesRepository $notesRepository): Response
    {
        $notes = $notesRepository->findAll();

        return $this->render('notes/index.html.twig', [
            
            'notes' => $notes,
        ]);
    }
}
