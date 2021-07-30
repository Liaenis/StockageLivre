<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Services\LivreService;

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
    public function CreaLivre(Request $requete,LivreService $paraLivreService){
        $NouveauLivre = new Livre();
        $formuLivre = $this->createForm(AuteurType::class, $NouveauLivre);
        $requete = Request::createFromGlobals();
        $formuLivre->handleRequest($requete);
        if ($formuLivre->isSubmitted() && $formuLivre->isValid()) {
            $NouveauLivre = $formuLivre->getData();
            $paraLivreService->SauvegarderLivre($NouveauLivre);
            $this->render("livre/livrecree.html.twig",[]);
        }
        else
            return $this->render("auteur/creationNouvelAuteur.html.twig",["formulaire"=>$formuLivre->createView()]);
    }
    /**
     * @Route("/livre/ListeAuteurs", name="Liste_Livres")
     */
    public function afficherAuteurs(LivreService $paraLivreService){
        $listelivres =$paraLivreService->obtenirListeAuteurs();
        return $this->render('livre/list.html.twig',
            ['liste_livre'=>$listelivres]);
    }
}
