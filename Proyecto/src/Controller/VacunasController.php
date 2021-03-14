<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VacunasController extends AbstractController
{
    #[Route('/vacunas', name: 'vacunas')]
    public function index(): Response
    {
        return $this->render('vacunas/index.html.twig', [
            'controller_name' => 'VacunasController',
        ]);
    }
}
