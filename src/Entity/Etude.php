<?php

namespace App\Entity;

use App\Repository\EtudeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudeRepository::class)]
class Etude
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'date')]
    private $date_debut;

    #[ORM\Column(type: 'date')]
    private $date_fin;

    #[ORM\Column(type: 'boolean')]
    private $en_cours;

    #[ORM\Column(type: 'integer')]
    private $phases;

    #[ORM\OneToOne(targetEntity: Client::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $client;

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

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getEnCours(): ?bool
    {
        return $this->en_cours;
    }

    public function setEnCours(bool $en_cours): self
    {
        $this->en_cours = $en_cours;

        return $this;
    }

    public function getPhases(): ?int
    {
        return $this->phases;
    }

    public function setPhases(int $phases): self
    {
        $this->phases = $phases;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
