<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\Offer;
use App\Entity\SkillOffer;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OffersController extends AbstractController
{
    #[Route('/offers')]
    public function main(ManagerRegistry $doctrine): Response {
        $offers = [];

        $db_offers = $doctrine->getRepository(Offer::class)->findAll();

        foreach ($db_offers as $offer) {
            $skills = $doctrine->getRepository(SkillOffer::class)
                ->findBy(array('id_offer' => $offer->getId()));

            if (count($skills) == 0) {
                continue;
            }

            $company = $doctrine->getRepository(Company::class)
                ->findOneBy(array('id' => $offer->getId()));

            $obj = (object)[
                'company' => $company->getName(),
                'skills' => $skills
            ];

            $offers[] = $obj;
        }

        return $this->render('offers.html.twig', array("offers" => $offers, "skills" => [
            "Java", "Flutter", "NodeJS", "PHP", "Git", "Python", "Agile"
        ]));
    }
}
