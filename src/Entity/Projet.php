<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Techno $techno_id = null;

    #[ORM\Column(length: 255)]
    private ?string $image_projet = null;

    #[ORM\Column(length: 255)]
    private ?string $alt = null;

    #[ORM\Column(length: 255)]
    private ?string $temps_realisation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $lien = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $lien_github = null;

    #[ORM\Column(length: 255)]
    private ?string $image_apercu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTechnoId(): ?Techno
    {
        return $this->techno_id;
    }

    public function setTechnoId(?Techno $techno_id): static
    {
        $this->techno_id = $techno_id;

        return $this;
    }

    public function getImageProjet(): ?string
    {
        return $this->image_projet;
    }

    public function setImageProjet(string $image_projet): static
    {
        $this->image_projet = $image_projet;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): static
    {
        $this->alt = $alt;

        return $this;
    }

    public function getTempsRealisation(): ?string
    {
        return $this->temps_realisation;
    }

    public function setTempsRealisation(string $temps_realisation): static
    {
        $this->temps_realisation = $temps_realisation;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): static
    {
        $this->lien = $lien;

        return $this;
    }

    public function getLienGithub(): ?string
    {
        return $this->lien_github;
    }

    public function setLienGithub(string $lien_github): static
    {
        $this->lien_github = $lien_github;

        return $this;
    }

    public function getImageApercu(): ?string
    {
        return $this->image_apercu;
    }

    public function setImageApercu(string $image_apercu): static
    {
        $this->image_apercu = $image_apercu;

        return $this;
    }
}
