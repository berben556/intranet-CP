<?php

namespace App\Entity;

use App\Repository\MembreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MembreRepository::class)]
class Membre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenom;

    #[ORM\ManyToOne(targetEntity: Status::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $status_id;

    #[ORM\Column(type: 'integer')]
    private $roles_id;

    #[ORM\ManyToOne(targetEntity: Pole::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $pole_id;

    public function getId(): ?int
    {
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

    public function getStatusId(): ?Status
    {
        return $this->status_id;
    }

    public function setStatusId(?Status $status_id): self
    {
        $this->status_id = $status_id;

        return $this;
    }

    public function getRolesId(): ?int
    {
        return $this->roles_id;
    }

    public function setRolesId(int $roles_id): self
    {
        $this->roles_id = $roles_id;

        return $this;
    }

    public function getPoleId(): ?Pole
    {
        return $this->pole_id;
    }

    public function setPoleId(?Pole $pole_id): self
    {
        $this->pole_id = $pole_id;

        return $this;
    }
}
