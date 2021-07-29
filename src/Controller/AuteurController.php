<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Form\AuteurType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuteurController extends AbstractController
{
    /**
     * @Route("/auteur", name="auteur")
     */
    public function index(): Response{
        return $this->render('auteur/index.html.twig', [
            'controller_name' => 'AuteurController',
        ]);
    }
    /**
     * @Route("/auteur/CreaAuteur", name="Creation_auteur")
     */
    public function CreaAuteur(){
        $NouvelAuteur = new Auteur("","","");
        $formuAuteur = $this->createForm(AuteurType::class, $NouvelAuteur);
        $this->render("auteur/creationNouvelAuteur.html.twig",["formulaire"=>$formuAuteur]);
    }


}
