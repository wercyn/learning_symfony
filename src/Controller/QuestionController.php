<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response('ASD A sdfds fsd fsdf');
    }

    /**
     * @Route("/questions/{question}")
     */
    public function show($question)
    {

        $answers = [
            'testowa odpwoeidz na zadane pytanie',
            'głupia odpowiedz człowiekasfrustrowanego życiem',
            'najgorsza firma to trol intermedia'
        ];

        return $this->render('question/show.html.twig', [
            'question' => ucwords(str_replace('-', ' ', $question)),
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'answers' => $answers
        ]);
    }
}