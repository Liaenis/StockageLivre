<?php

namespace App\Services;

use App\Entity\Auteur;
use Doctrine\ORM\EntityManagerInterface;

class AuteurService {

    private $_enManager;

    public function __construct(EntityManagerInterface $paraEnManager){
        $this->_enManager = $paraEnManager;
    }

    public function SauvegarderAuteur( Auteur $paraAuteur){
        $this->_enManager->persist($paraAuteur);
        $this->_enManager->flush();
    }
/*
    public function supprimerAuteur( Auteur $paraAuteur){

    }
*/
}