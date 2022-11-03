<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i=0;$i<5;$i++) {
            $user = new User();
            $user->setName($faker->name);
            $user->setAddress($faker->address);
            $user->setAge($faker->numberBetween(18,70));
            $user->setEmail($faker->email);
            $user->setPhone($faker->phoneNumber);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
