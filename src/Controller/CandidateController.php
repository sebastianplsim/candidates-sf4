<?php

namespace App\Controller;

use ApiPlatform\Core\Api\IriConverterInterface;
use App\DataFixtures\PostitionFixtures;
use App\Entity\Position;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class CandidateController extends AbstractController
{
    /**
     * @Route("/", name="entry", methods="GET")
     */
    public function entry(RouterInterface $router, IriConverterInterface $converter)
    {
        $positions = array_map(function (Position $p) use ($converter) {
            return ['@id' => $converter->getIriFromItem($p), 'name' => $p->getName()];
        }, $this->getDoctrine()->getRepository(Position::class)->findAll());

        return $this->render('candidate/entry.html.twig', [
            'enterUrl' => $router->generate('api_candidates_post_collection'),
            'positions' => $positions
        ]);
    }
}
