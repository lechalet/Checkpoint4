<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Event;
use App\Entity\Actor;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/evenement", name="evenement_list")
     */
    public function event()
    {
        $events = $this->getDoctrine()
        ->getRepository(Event::class)
        ->findAll();

        return $this->render('event/event.html.twig', [
            'events' => $events,
        ]);
    }

    /**
     * @Route("/evenement/{id}", name="evenement_show", methods={"GET"})
     */
    public function show(Event $event): Response
    {
        return $this->render('event/detail.html.twig', [
            'event' => $event,
        ]);
    }
}
