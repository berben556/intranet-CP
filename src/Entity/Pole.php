<?php

namespace App\Entity;

use App\Repository\PoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'pole', targetEntity: Membre::class)]
    private $membre_id;

    public function __construct()
    {
        $this->membre_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPole_Name(): ?string
    {
        return $this->pole_name;
    }

    public function setPole_Name(string $pole_name): self
    {
        $this->pole_name = $pole_name;

        return $this;
    }

    /**
     * @return Collection<int, Membre>
     */
    public function getMembre_Id(): Collection
    {
        return $this->membre_id;
    }

    public function addMembre_Id(Membre $membreId): self
    {
        if (!$this->membre_id->contains($membreId)) {
            $this->membre_id[] = $membreId;
            $membreId->setPole($this);
        }

        return $this;
    }

    public function removeMembre_Id(Membre $membreId): self
    {
        if ($this->membre_id->removeElement($membreId)) {
            // set the owning side to null (unless already changed)
            if ($membreId->getPole() === $this) {
                $membreId->setPole(null);
            }
        }

        return $this;
    }
}
