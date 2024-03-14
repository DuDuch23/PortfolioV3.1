<?php

namespace App\DataFixtures;

use App\Entity\Timeline;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TimelineFixtures extends Fixture implements DependentFixtureInterface
{
    public const TIMELINE = [
        [
            'date' => '2017',
            'description' => 'blabla',
            'alt' => 'html',
        ],
        [
            'date' => '2017',
            'description' => 'blabla',
            'alt' => 'css',
        ],
        [
            'date' => '2022',
            'description' => 'blabla',
            'alt' => 'js',
        ],
        [
            'date' => '2017',
            'description' => 'blabla',
            'alt' => 'html',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach(self::TIMELINE as $attributes)
        {
            $timeline = new Timeline();

            $technoReference = array_rand(TechnoFixtures::TECHNO);
            $techno = $this->getReference($technoReference);

            $timeline->setNomTechnoId($techno);
            $timeline->setDate(new \DateTime($attributes['date']));
            $timeline->setDescription($attributes['description']);
            $timeline->setAlt($attributes['alt']);

            $manager->persist($timeline);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return[
            TechnoFixtures::class,
        ];
    }
}