<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;


class AppFixtures extends Fixture
{
    private $userPasswordHasher;
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setEmail("user10@bookapi.com");
        $user->setRoles(["ROLE_USER"]);
        $user->setToken("abcdefghijk");
        $user->setCivility("Madame");
        $user->setTel(555555);
        $user->setNomComplet("Madame");
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "password"));
        $user->setFirstActive(true);

        $manager->persist($user);
        
        // Création d'un user admin
        $userAdmin = new User();
        $userAdmin->setEmail("admin10@bookapi.com");
        $userAdmin->setRoles(["ROLE_ADMIN"]);
        $userAdmin->setToken("abcdefghijk");
        $userAdmin->setCivility("Madame");
        $userAdmin->setTel(555555);
        $userAdmin->setNomComplet("Madame");
        $userAdmin->setFirstActive(true);


        $userAdmin->setPassword($this->userPasswordHasher->hashPassword($userAdmin, "password"));
        $manager->persist($userAdmin);

        $manager->flush();
    }
}