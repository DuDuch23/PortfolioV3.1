<?php

namespace App\DataFixtures;

use App\Entity\Message;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MessageFixtures extends Fixture
{
    public const MESSAGE = [
        [
            'nom' => 'Duchemin',
            'prenom' => 'Alexandre',
            'email' => 'alexduduch77@gmail.com',
            'contenu' => 'dede', 
        ],
        [
            'nom' => 'Delafontaine',
            'prenom' => 'Théo',
            'email' => 'théodelafontainer@gmail.com',
            'contenu' => 'Il a manger le bébé', 
        ],
        [
            'nom' => 'Evan',
            'prenom' => 'Jerequiel',
            'email' => 'evanoslhomos@gmail.com',
            'contenu' => 'tu t\'tais', 
        ],
        [
            'nom' => 'Deroche',
            'prenom' => 'Stanislas',
            'email' => 'stan.d@gmail.com',
            'contenu' => 'ouaaaaii c\'est micheel, tu donnes pas de nouvelles, on peut pas te faire confiance', 
        ],
        [
            'nom' => 'Matyeux',
            'prenom' => 'Dos Santos',
            'email' => 'mat.dos@gmail.com',
            'contenu' => 'hassoul', 
        ],
        [
            'nom' => 'Fauvel',
            'prenom' => 'David',
            'email' => 'david.fauvel@gmail.com',
            'contenu' => 'MAIS PTN HEAL', 
        ],
        [
            'nom' => 'Brian',
            'prenom' => 'jsaisplus',
            'email' => 'alexduduch77@gmail.com',
            'contenu' => 'Is in de kitchen', 
        ],
        [
            'nom' => 'Florient',
            'prenom' => 'jsaisplus',
            'email' => 'alexduduch77@gmail.com',
            'contenu' => 'Where is bryan ?', 
        ],
        [
            'nom' => 'Deoliveira',
            'prenom' => 'Pauline',
            'email' => 'pauline.dlvr@gmail.com',
            'contenu' => 'meeeeeeh', 
        ],
        [
            'nom' => 'Harsuike',
            'prenom' => 'Florie',
            'email' => 'florie.h@gmail.com',
            'contenu' => 'dede', 
        ],
        [
            'nom' => 'Leteissier',
            'prenom' => 'Natan',
            'email' => 'natan.lts@gmail.com',
            'contenu' => 'Je suis étienne', 
        ],
    ];

    public const PARTENARIAT = 'SUJET_PARTENARIAT';

    public const OFFRE = 'SUJET_OFFRE';

    public const AUTRE = 'SUJET_AUTRE';

    public const SUJET = [
        self::PARTENARIAT => [
            'nom' => 'Demande de partenariat'
        ],

        self::OFFRE => [
            'nom' => 'Demande d\'offre'
        ],

        self::AUTRE => [
            'nom' => 'Autre..'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach(self::MESSAGE as $attributes)
        {
            $message = new Message();
            $message->setNom($attributes['nom']);
            $message->setPrenom($attributes['prenom']);
            $message->setEmail($attributes['email']);
            $message->setContenu($attributes['contenu']);
            
            $sujetReference = array_rand(self::SUJET);
            $sujet = self::SUJET[$sujetReference]['nom'];
            $message->setSujet($sujet);

            $manager->persist($message);
        }

        $manager->flush();
    }
}