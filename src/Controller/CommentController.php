<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/comments/{id}/vote/{direction<up|down>}", methods="POST")
     */
    public function commentVote($id, $direction, LoggerInterface $logger)
    {

        if($direction === 'up'){
            $logger->info('voting up!');
            $currentVoteCount = rand(7, 100);
        }elseif($direction === 'down'){
            $logger->info('voting down!');
            $currentVoteCount = rand(0, 5);
        }

        return new JsonResponse(['votes' => $currentVoteCount]);

    }
}