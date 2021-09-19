<?php

namespace App\Entity;

use App\Repository\CategorieTacheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=CategorieTacheRepository::class)
 * @ApiResource(
 *     collectionOperations={"get"={"normalization_context"={"groups"="categorieTache:list"}}},
 *     itemOperations={"get"={"normalization_context"={"groups"="categorieTache:item"}}},
 *     order={"id"="ASC"},
 *     paginationEnabled=false
 * )
 */
class CategorieTache
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['categorieTache:list', 'categorieTache:item'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['categorieTache:list', 'categorieTache:item'])]
    private $intitule;


    /**
     * @ORM\OneToMany(targetEntity=Tache::class, mappedBy="categorieTache", orphanRemoval=true)
     */
    private $tache;

    public function __construct()
    {
        $this->tache = new ArrayCollection();
    }

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


    public function __toString(): string
    {
        return $this->intitule;
    }

    /**
     * @return Collection|Tache[]
     */
    public function getTache(): Collection
    {
        return $this->tache;
    }

    public function addTache(Tache $tache): self
    {
        if (!$this->tache->contains($tache)) {
            $this->tache[] = $tache;
            $tache->setCategorieTache($this);
        }

        return $this;
    }

    public function removeTache(Tache $tache): self
    {
        if ($this->tache->removeElement($tache)) {
            // set the owning side to null (unless already changed)
            if ($tache->getCategorieTache() === $this) {
                $tache->setCategorieTache(null);
            }
        }

        return $this;
    }
}
