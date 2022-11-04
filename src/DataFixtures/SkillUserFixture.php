<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\SkillUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillUserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for($i=0;$i<5;$i++) {
            $skill_user = new SkillUser();
            $skill_user->setIdUser($faker->numberBetween(0,4));
            $skill_user->setname("devellopeur");
            $manager->persist($skill_user);
        }
        $manager->flush();
    }
}
