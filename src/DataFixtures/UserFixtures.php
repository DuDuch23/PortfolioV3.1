<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    }

    public const USER = [
        [
            'nom' => 'Delafontaine',
            'prenom' => 'Théo',
            'email' => 'théodelafontainer@gmail.com',
            'role' => ["ROLE_VISITEUR"],
            'password' => 'lechatblanc',
            'photo_profil' => 'theo.png',
        ],
        [
            'nom' => 'Harsuike',
            'prenom' => 'Florie',
            'email' => 'florie.h@gmail.com',
            'role' => ["ROLE_VISITEUR"],
            'password' => 'lechatviolet',
            'photo_profil' => 'florie.png',
        ],
        [
            'nom' => 'Deroche',
            'prenom' => 'Stanislas',
            'email' => 'stan.d@gmail.com',
            'role' => ["ROLE_VISITEUR"],
            'password' => 'furidax',
            'photo_profil' => 'stan.png',
        ],
        [
            'nom' => 'Fauvel',
            'prenom' => 'David',
            'email' => 'david.fauvel@gmail.com',
            'role' => ["ROLE_VISITEUR"],
            'password' => 'davsoquer',
            'photo_profil' => 'david.png',
        ],
        [
            'nom' => 'Jerequiel',
            'prenom' => 'Evan',
            'email' => 'evanoslhomos@gmail.com',
            'role' => ["ROLE_VISITEUR"],
            'password' => 'aquila',
            'photo_profil' => 'evan.png',
        ],
        [
            'nom' => 'Dos Santos',
            'prenom' => 'Matyeux',
            'email' => 'mat.dos@gmail.com',
            'role' => ["ROLE_VISITEUR"],
            'password' => 'sandostos',
            'photo_profil' => 'matyeux.png',
        ],
        [
            'nom' => 'Deoliveira',
            'prenom' => 'Pauline',
            'email' => 'pauline.dlvr@gmail.com',
            'role' => ["ROLE_VISITEUR"],
            'password' => 'paupau',
            'photo_profil' => 'pauline.png',
        ],
        [
            'nom' => 'Lantez',
            'prenom' => 'Téo',
            'email' => 'téolantez@gmail.com',
            'role' => ["ROLE_VISITEUR"],
            'password' => 'teolantez',
            'photo_profil' => 'teo.png',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach(self::USER as $attributes)
        {
            $user = new User();
            $user->setNom($attributes['nom']);
            $user->setPrenom($attributes['prenom']);
            $user->setEmail($attributes['email']);
            $user->setRoles($attributes['role']);
            $user->setPassword($this->userPasswordHasherInterface->hashPassword($user, $attributes['password']));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
