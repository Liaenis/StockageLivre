<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Form\AuteurType;
use App\Services\AuteurService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
    public function CreaAuteur(Request $requete,AuteurService $paraAuteurService){
        $NouvelAuteur = new Auteur();
        $formuAuteur = $this->createForm(AuteurType::class, $NouvelAuteur);
        $requete = Request::createFromGlobals();
        $formuAuteur->handleRequest($requete);
        if ($formuAuteur->isSubmitted() && $formuAuteur->isValid()) {
            $NouvelAuteur = $formuAuteur->getData();
            $paraAuteurService->SauvegarderAuteur($NouvelAuteur);
            $this->render("auteur/auteurcree.html.twig",[]);
        }
        else
            return $this->render("auteur/creationNouvelAuteur.html.twig",["formulaire"=>$formuAuteur->createView()]);
    }
    /**
     * @Route("/auteur/ListeAuteurs", name="Liste_Auteurs")
     */
    public function afficherAuteurs(AuteurService $paraAuteurService){
        $listeAuteurs =$paraAuteurService->obtenirListeAuteurs();
        return $this->render('auteur/list.html.twig',
            ['auteurlist'=>$listeAuteurs]);
    }
}
