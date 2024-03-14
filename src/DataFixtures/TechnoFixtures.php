<?php

namespace App\DataFixtures;

use App\Entity\Techno;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TechnoFixtures extends Fixture
{
    public const TECHNO_HTML = 'HTML';
    public const TECHNO_CSS = 'CSS';
    public const TECHNO_JS = 'JS';
    public const TECHNO_PHP = 'PHP';
    public const TECHNO_SYMFONY = 'SYMFONY';
    public const TECHNO_CSHARP = 'C#';
    public const TECHNO_PYTHON = 'PYTHON';

    public const TECHNO = [
        self::TECHNO_HTML => [
            'nom' => 'html',
            'image' => 'html.png',
        ],
        self::TECHNO_CSS => [
            'nom' => 'css',
            'image' => 'css.png',
        ],
        self::TECHNO_JS => [
            'nom' => 'js',
            'image' => 'js.png',
        ],
        self::TECHNO_PHP => [
            'nom' => 'php',
            'image' => 'php.png',
        ],
        self::TECHNO_SYMFONY => [
            'nom' => 'symfony',
            'image' => 'symfony.png',
        ],
        self::TECHNO_CSHARP => [
            'nom' => 'c#',
            'image' => 'c#.png',
        ],
        self::TECHNO_PYTHON => [
            'nom' => 'python',
            'image' => 'python.png',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach($this::TECHNO as $code => $attributes)
        {
            $techno = new Techno();
            $techno->setNom($attributes['nom']);
            $techno->setImage($attributes['image']);

            $manager->persist($techno);

            $this->addReference($code, $techno);
        }

        $manager->flush();
    }
}