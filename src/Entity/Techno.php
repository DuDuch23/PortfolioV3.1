<?php

namespace App\Entity;

use App\Repository\TechnoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: TechnoRepository::class)]
#[Vich\Uploadable]
class Techno
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[Vich\UploadableField(mapping: 'techno_image', fileNameProperty: 'imageNameTechno')]
    private ?File $imageFileTechno = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageNameTechno = null;

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

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFileTechno
     */

     public function setimageFileTechno(?File $imageFileTechno = null): void
     {
         $this->imageFileTechno = $imageFileTechno;
     }
 
     public function getimageFileTechno(): ?File
     {
         return $this->imageFileTechno;
     }
 
     public function setimageNameTechno(?string $imageNameTechno): void
     {
         $this->imageNameTechno = $imageNameTechno;
     }
 
     public function getimageNameTechno(): ?string
     {
         return $this->imageNameTechno;
     }
}
