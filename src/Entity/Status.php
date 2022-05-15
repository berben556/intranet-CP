<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatusRepository::class)]
class Status
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $status_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatusName(): ?string
    {
        return $this->status_name;
    }

    public function setStatusName(string $status_name): self
    {
        $this->status_name = $status_name;

        return $this;
    }

    public function getRole(): ?Membre
    {
        return $this->role;
    }

    public function setRole(?Membre $role): self
    {
        $this->role = $role;

        return $this;
    }
}
