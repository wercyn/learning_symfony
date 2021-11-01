<?php

namespace App\Controller;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Twig\Environment;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('question/homepage.html.twig');
    }

    /**
     * @Route("/questions/{question}", name="app_question_show")
     */
    public function show($question, MarkdownParserInterface $markdownParser, CacheInterface $cache)
    {

        $answers = [
            'testowa odpwoeidz na zadane pytanie',
            'kolejna testowa odpowiedź na pytanie',
            'Make sure your cat is sitting `purrrfectly` still 🤣'
        ];

        $questionText = 'Dlaczego kwadrat ma **4** kąty?';
        $parsedQuestionText = $cache->get('markdown_'.md5($questionText), function() use ($questionText, $markdownParser){
            return $markdownParser->transformMarkdown($questionText);
        });
        $questionAuthor = 'Wercyn';
        dump($cache);
        return $this->render('question/show.html.twig', [
            'question' => ucwords(str_replace('-', ' ', $question)),
            'questionText' => $parsedQuestionText,
            'questionAuthor' => $questionAuthor,
            'answers' => $answers
        ]);
    }
}