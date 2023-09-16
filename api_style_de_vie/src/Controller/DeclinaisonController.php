<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Declinaison;

class DeclinaisonController extends AbstractController
{
    /**
     * @Route("/declinaison", name="app_declinaison")
     */
    public function index(): Response
    {
        return $this->render('declinaison/index.html.twig', [
            'controller_name' => 'DeclinaisonController',
        ]);
    }

}
