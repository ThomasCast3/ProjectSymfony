<?php

namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompanyFixture extends Fixture
{
    public final const COMPANY_MICROSOFT = "COMPANY_MICROSOFT";
    public function load(ObjectManager $manager): void
    {
        $microsoft = new Company();
        $microsoft->setName("Microsoft");
        $this->addReference(self::COMPANY_MICROSOFT, $microsoft);
        $manager->persist($microsoft);

        $manager->flush();
    }
}
