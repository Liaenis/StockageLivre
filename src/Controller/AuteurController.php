<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Form\AuteurType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
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
        $requete = Request::createFromGlobals();
        $formuAuteur->handleRequest($requete);
        if ($formuAuteur->isSubmitted() && $formuAuteur->isValid()) {
            $NouvelAuteur = $formuAuteur->getData();
            $this->render("auteur/auteurcree.html.twig",[]);
        }
        else
            return $this->render("auteur/creationNouvelAuteur.html.twig",["formulaire"=>$formuAuteur->createView()]);
    }
}
