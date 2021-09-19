<?php

namespace App\Entity;

use App\Repository\TacheRepository;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=TacheRepository::class)
 *  @ApiResource(
 *     collectionOperations={"get"={"normalization_context"={"groups"="tache:list"}}},
 *     itemOperations={"get"={"normalization_context"={"groups"="tache:item"}}},
 *     order={"id"="ASC"},
 *     paginationEnabled=false
 * )
 *
 * @ApiFilter(SearchFilter::class, properties={"categorieTache": "exact"})
 */
class Tache
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['tache:list', 'tache:item'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['tache:list', 'tache:item'])]
    private $intitule;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['tache:list', 'tache:item'])]
    private $point;


    /**
     * @ORM\Column(type="string")
     */
    #[Groups(['tache:list', 'tache:item'])]
    private $icon;


    /**
     * @ORM\ManyToOne(targetEntity=CategorieTache::class, inversedBy="tache")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['tache:list', 'tache:item'])]
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
