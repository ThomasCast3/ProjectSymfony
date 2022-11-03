<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\SkillOffer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillOfferFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for($i=0;$i<5;$i++) {
            $skill_offer = new SkillOffer();
            $skill_offer->setIdOffer($faker->numberBetween(0,4));
            $skill_offer->setname("devellopeur");
            $manager->persist($skill_offer);
        }

        $manager->flush();
    }
}
