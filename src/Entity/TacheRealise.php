<?php

namespace App\Entity;

use App\Repository\TacheRealiseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TacheRealiseRepository::class)
 */
class TacheRealise
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $IDUtilisateur;

    /**
     * @ORM\Column(type="integer")
     */
    private $IDTache;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDUtilisateur(): ?int
    {
        return $this->IDUtilisateur;
    }

    public function setIDUtilisateur(int $IDUtilisateur): self
    {
        $this->IDUtilisateur = $IDUtilisateur;

        return $this;
    }

    public function getIDTache(): ?int
    {
        return $this->IDTache;
    }

    public function setIDTache(int $IDTache): self
    {
        $this->IDTache = $IDTache;

        return $this;
    }
}
