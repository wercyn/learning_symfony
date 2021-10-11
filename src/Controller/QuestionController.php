<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController
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
        return new Response('Future page to show: '.$question);
    }
}