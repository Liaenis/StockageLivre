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
/*
    public function supprimerAuteur( Auteur $paraAuteur){

    }
*/
}