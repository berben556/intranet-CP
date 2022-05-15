<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\MembreRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Registry;
use App\Entity\membre;

class MembreController extends AbstractController
{

   

    #[Route('/membre', name: 'app_membre')]
    public function index( MembreRepository $membreRepo ) : Response
    {

        $membres = $membreRepo->findAll();

        return $this->render('membre/index.html.twig', [
            'controller_name' => 'MembreController',
            'membres' => $membres
        ]);
    }
}
