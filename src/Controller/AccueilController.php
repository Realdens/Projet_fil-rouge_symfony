<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findLastPosts(10);
        $slides = $postRepository->findLastPosts(3);
        
        return $this->render('accueil/index.html.twig', [
            'posts' => $posts,
            'slides' => $slides,
        ]);
    }
}
