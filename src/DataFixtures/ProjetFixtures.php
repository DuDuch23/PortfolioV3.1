<?php

namespace App\DataFixtures;

use App\Entity\Projet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjetFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROJET = [
        [
            'nom' => 'Cv Alex Johnson',
            'description' => 'Premier projet d\'intégration de BTS SIO 1er année',
            'image_projet' => 'alex.png',
            'alt' => 'alex-johnson',
            'temps_realisation' => '1 semaine',
            'lien' => './projets/Projet_1_cv/CV-Alex-Johnson.html',
            'lien_github' => 'https://github.com/DuDuch23/Projet-1-cv.git',
            'image_aperçu' => 'Alex-Johnson.PNG',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach(self::PROJET as $attributes)
        {
            $projet = new Projet();

            $technoReference = array_rand(TechnoFixtures::TECHNO);
            $techno = $this->getReference($technoReference);

            $projet->setTechnoId($techno);
            $projet->setNom($attributes['nom']);
            $projet->setDescription($attributes['description']);
            $projet->setImageProjet($attributes['image_projet']);
            $projet->setAlt($attributes['alt']);
            $projet->setTempsRealisation($attributes['temps_realisation']);
            $projet->setLien($attributes['lien']);
            $projet->setLienGithub($attributes['lien_github']);
            $projet->setImageAperçu($attributes['image_aperçu']);

            $manager->persist($projet);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TechnoFixtures::class,
        ];
    }
}