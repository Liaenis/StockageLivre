<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LivreController extends AbstractController
{
    /**
     * @Route("/livre", name="livre")
     */
    public function index(): Response
    {
        return $this->render('livre/index.html.twig', [
            'controller_name' => 'LivreController',
        ]);
    }
        /**
     * @Route("/livre/CreaLivre", name="Creation_livre")
     */
    public function CreaLivre(){
        $NouveauLivre = new Auteur("","","");
        $formuLivre = $this->createForm(AuteurType::class, $NouveauLivre);
        $requete = Request::createFromGlobals();
        $formuLivre->handleRequest($requete);
        if ($formuLivre->isSubmitted() && $formuLivre->isValid()) {
            $NouveauLivre = $formuLivre->getData();
            $this->render("livre/livrecree.html.twig",[]);
        }
        else
            return $this->render("auteur/creationNouvelAuteur.html.twig",["formulaire"=>$formuLivre->createView()]);
    }
}
