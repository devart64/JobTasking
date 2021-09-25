<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\Security\Core\Encoder\PasswordHasherEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 * @method string getUserIdentifier()
 *  @ApiResource(
 *     collectionOperations={"get"={"normalization_context"={"groups"="utilisateur:list"}}},
 *     itemOperations={"get"={"normalization_context"={"groups"="utilisateur:item"}}},
 *     order={"username"="ASC"},
 *     paginationEnabled=false
 * )
 *
 * @ApiFilter(SearchFilter::class, properties={"utilisateur": "exact"})
 */
class Utilisateur implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['utilisateur:list', 'utilisateur:item'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    #[Groups(['utilisateur:list', 'utilisateur:item'])]
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    #[Groups(['utilisateur:list', 'utilisateur:item'])]
    private $roles = ['ROLE_USER'];


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['utilisateur:list', 'utilisateur:item'])]
    private $imageProfil = '';

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['utilisateur:list', 'utilisateur:item'])]
    private $username;



    public function getId(): ?int
    {
        return $this->id;
    }


    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        if ($this->getPassword() === null) {
            $this->password = password_hash( $password, PASSWORD_DEFAULT,  $options = []);
        }


        return $this;
    }

    public function getImageProfil(): ?string
    {
        return $this->imageProfil;
    }

    public function setImageProfil(string $imageProfil): self
    {
        $this->imageProfil = $imageProfil;

        return $this;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;

    }

    public function getRoles()
    {
        return $this->roles;
        //return array_unique(array_merge(['ROLE_USER'], $this->roles));
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUsername(): string
    {
       return (string) $this->username;
    }

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

}
