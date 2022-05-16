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

   

    #[Route('/membre', name: 'membre')]
    public function index( MembreRepository $membreRepo ) : Response
    {

        $membres = $membreRepo->findAll();

        return $this->render('membre/index.html.twig', [
            'controller_name' => 'MembreController',
            'membres' => $membres,
        ]);
    }

    #[Route('/delete_membre/{id}', name: 'delete_membre')]
    public function delete ( int $id, MembreRepository $membreRepo ) : Response
    {
        
        $membre= $membreRepo->findOneById($id);
        $membreRepo->remove($membre, true);


        return $this->redirectToRoute("membre");
    }
}
