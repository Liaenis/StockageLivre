<?php

namespace App\Services;

use App\Entity\Auteur;
use Doctrine\ORM\EntityManagerInterface;

class AuteurService {

    private $EnManager;

    public function __construct(EntityManagerInterface $paraEnManager){
        $this->$EnManager = $paraEnManager;
    }

}