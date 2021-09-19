<?php

namespace App\Entity;

use App\Repository\TacheRepository;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=TacheRepository::class)
 * #[ApiResource]
 */
class Tache
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
    private $intitule;

    /**
     * @ORM\Column(type="integer")
     */
    private $point;


    /**
     * @ORM\Column(type="string")
     */
    private $icon;


    /**
     * @ORM\ManyToOne(targetEntity=CategorieTache::class, inversedBy="tache")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorieTache;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getPoint(): ?int
    {
        return $this->point;
    }

    public function setPoint(int $point): self
    {
        $this->point = $point;

        return $this;
    }
    public function __toString(): string
    {
        return $this->intitule.' '.$this->point;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     */
    public function setIcon($icon): void
    {
        $this->icon = $icon;
    }

    public function getCategorieTache(): ?CategorieTache
    {
        return $this->categorieTache;
    }

    public function setCategorieTache(?CategorieTache $categorieTache): self
    {
        $this->categorieTache = $categorieTache;

        return $this;
    }


}
