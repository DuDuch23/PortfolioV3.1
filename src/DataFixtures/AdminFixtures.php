<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    }

    public const ADMIN = [
        [
            'email' => 'alexduduch77@gmail.com',
            'roles' => ["ROLE_SUPER_ADMIN"],
            'password' => 'mushumonchat',
        ],
        [
            'email' => 'alexduduch60@gmail.com',
            'roles' => ["ROLE_ADMIN"],
            'password' => 'mushumonchat',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach(self::ADMIN as $attributes)
        {
            $admin = new Admin();
            $admin->setEmail($attributes['email']);
            $admin->setRoles($attributes['roles']);
            $admin->setPassword($this->userPasswordHasherInterface->hashPassword($admin, $attributes['password']));

            $manager->persist($admin);
        }

        $manager->flush();
    }
}
