<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
#[Vich\Uploadable]
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

    #[Vich\UploadableField(mapping: 'projet_image', fileNameProperty: 'imageNameProjet')]
    private ?File $imageFileProjet = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageNameProjet = null;

    #[ORM\Column(length: 255)]
    private ?string $alt = null;

    #[ORM\Column(length: 255)]
    private ?string $temps_realisation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $lien = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $lien_github = null;

    #[Vich\UploadableField(mapping: 'projet_apercu', fileNameProperty: 'imageNameProjetApercu')]
    private ?File $imageFileProjetApercu = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageNameProjetApercu = null;

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

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFileProjet
     */

    public function setImageFileProjet(?File $imageFileProjet = null): void
    {
        $this->imageFileProjet = $imageFileProjet;
    }

    public function getImageFileProjet(): ?File
    {
        return $this->imageFileProjet;
    }

    public function setImageNameProjet(?string $imageNameProjet): void
    {
        $this->imageNameProjet = $imageNameProjet;
    }

    public function getImageNameProjet(): ?string
    {
        return $this->imageNameProjet;
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

     /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFileProjetApercu
     */
    public function setImageFileProjetApercu(?File $imageFileProjetApercu = null): void
    {
        $this->imageFileProjetApercu = $imageFileProjetApercu;
    }

    public function getImageFileProjetApercu(): ?File
    {
        return $this->imageFileProjetApercu;
    }

    public function setImageNameProjetApercu(?string $imageNameProjetApercu): void
    {
        $this->imageNameProjetApercu = $imageNameProjetApercu;
    }

    public function getImageNameProjetApercu(): ?string
    {
        return $this->imageNameProjetApercu;
    }
}
