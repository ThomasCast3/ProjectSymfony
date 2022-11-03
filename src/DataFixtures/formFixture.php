<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class formFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<5;$i++) {
            $user = new User();
            $user->setName($i);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
