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
    public function majAuteur(Auteur $paraAuteur){
        //a faire
        $this->_enManager->flush();
    }
    public function lireAuteur($paraID){
        $find = false;
        $Auteur = $this->_enManager->getRepository(Auteur::class)->find($pId);
        if (isset($Auteur))
            $find = true;
        return  ['found'=>$find,'Auteur'=>$Auteur];
    }
    public function supprimerAuteurParId($paraID){
        $auteur = $this->lireAuteur($paraID);
        if ($auteur['found']== true)
        {
            $this->_entityManager->remove($auteur['Auteur']);
            $this->_entityManager->flush();
        }
    }
    public function obtenirListeAuteurs(){

    }
}