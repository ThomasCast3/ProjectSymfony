<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Offer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OfferFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for($i=0;$i<5;$i++) {
            $offer = new Offer();
            $offer->setIdOffer($faker->numberBetween(0,4));
            $offer->setIdComp($faker->numberBetween(0,4));
            $offer->setName($faker->name);
            $offer->setMatched(false);
            $manager->persist($offer);
        }
        $manager->flush();
    }
}
