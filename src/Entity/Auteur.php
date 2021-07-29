<?php

namespace App\Entity;

use App\Repository\AuteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuteurRepository::class)
 */
class Auteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $biographie;

    /**
     * @ORM\ManyToMany(targetEntity=Livre::class)
     */
    private $listeLivre;

    public function __construct($paraNom, $paraPrenom, $paraBio){
        $this->nom = $paraNom;
        $this->prenom = $paraPrenom;
        $this->biographie = $paraBio;
        $this->listeLivre = new ArrayCollection();
    }

    public function getId(): ?int{
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getBiographie(): ?string
    {
        return $this->biographie;
    }

    public function setBiographie(string $biographie): self
    {
        $this->biographie = $biographie;

        return $this;
    }

    /**
     * @return Collection|Livre[]
     */
    public function getListeLivre(): Collection
    {
        return $this->listeLivre;
    }

    public function addListeLivre(Livre $listeLivre): self
    {
        if (!$this->listeLivre->contains($listeLivre)) {
            $this->listeLivre[] = $listeLivre;
        }

        return $this;
    }

    public function removeListeLivre(Livre $listeLivre): self
    {
        $this->listeLivre->removeElement($listeLivre);

        return $this;
    }
}
