<?php

namespace App\Services;

use App\Entity\Livre;
use Doctrine\ORM\EntityManagerInterface;

class LivreService {

    private $_enManager;

    public function __construct(EntityManagerInterface $paraEnManager){
        $this->$_enManager = $paraEnManager;
    }

    public function SauvegarderLivre( Livre $paraLivre){
        $this->_enManager->persist($paraLivre);
        $this->_enManager->flush();
    }
    public function majLivre(Livre $paraLivre){
        //a faire
        $this->_enManager->flush();
    }
    public function lireLivre($paraID){
        $find = false;
        $Auteur = $this->_enManager->getRepository(Auteur::class)->find($pId);
        if (isset($Auteur))
            $find = true;
        return  ['found'=>$find,'Auteur'=>$Auteur];
    }
    public function supprimerAuteurParId( $paraID){
        $livre = $this->lireAuteur($paraID);
        if ($livre['found']== true)
        {
            $this->_entityManager->remove($livre['Livre']);
            $this->_entityManager->flush();
        }
    }
}