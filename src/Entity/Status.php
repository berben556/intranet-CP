<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: Membre::class, mappedBy: 'status')]
    private $membre_id;

    public function __construct()
    {
        $this->membre_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus_Name(): ?string
    {
        return $this->status_name;
    }

    public function setStatus_Name(string $status_name): self
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
            $membreId->addStatus($this);
        }

        return $this;
    }

    public function removeMembre_Id(Membre $membreId): self
    {
        if ($this->membre_id->removeElement($membreId)) {
            $membreId->removeStatus($this);
        }

        return $this;
    }
}
