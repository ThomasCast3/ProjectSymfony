<?php

namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompanyFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<5;$i++) {
            $company = new Company();
            $company->setName($i);
            $manager->persist($company);
        }
        $manager->flush();
    }
}
