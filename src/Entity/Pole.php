<?php

namespace App\Entity;

use App\Repository\PoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PoleRepository::class)]
class Pole
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $pole_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoleName(): ?string
    {
        return $this->pole_name;
    }

    public function setPoleName(string $pole_name): self
    {
        $this->pole_name = $pole_name;

        return $this;
    }
}
