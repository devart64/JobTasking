<?php

namespace App\Entity;

use App\Repository\PieceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=PieceRepository::class)
 * @ApiResource(
 *     collectionOperations={"get"={"normalization_context"={"groups"="piece:list"}}},
 *     itemOperations={"get"={"normalization_context"={"groups"="piece:item"}}},
 *     order={"id"="ASC"},
 *     paginationEnabled=false
 * )
 */
class Piece
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['piece:list', 'piece:item'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['piece:list', 'piece:item'])]
    private $intitule;


    /**
     * @ORM\OneToMany(targetEntity=Tache::class, mappedBy="piece", orphanRemoval=true)
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
            $tache->setPiece($this);
        }

        return $this;
    }

    public function removeTache(Tache $tache): self
    {
        if ($this->tache->removeElement($tache)) {
            // set the owning side to null (unless already changed)
            if ($tache->getPiece() === $this) {
                $tache->setPiece(null);
            }
        }

        return $this;
    }
}
