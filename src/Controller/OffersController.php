<?php

namespace App\Controller;

use Faker;
use App\Entity\Company;
use App\Entity\Offer;
use App\Entity\SkillOffer;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OffersController extends AbstractController
{
    #[Route("/offers", name: "offers")]
    public function main(Request $request, ManagerRegistry $managerRegistry): Response {
        $faker = Faker\Factory::create('fr_FR');
        $offers = [];

        $db_offers = $managerRegistry->getRepository(Offer::class)->findAll();

        foreach ($db_offers as $offer) {

            $skills = $managerRegistry->getRepository(SkillOffer::class)
                ->findBy(array("id_offer" => $offer->getId()));

            if (count($skills) == 0) {
                continue;
            }

            $company = $managerRegistry->getRepository(Company::class)
                ->findOneBy(array("id" => $offer->getIdComp()));

            if ($company == null) {
                continue;
            }

            $obj = (object)[
                "id" => $offer->getId(),
                "name" => $offer->getName(),
                "company" => $company->getName(),
                "skills" => $skills
            ];

            $offers[] = $obj;
        }

        $companys = $managerRegistry->getRepository(Company::class)->findAll();


        $tmp = [];

        foreach($companys as $company) {
            $tmp[] = [$company->getName() => $company->getId()];
        }

        $defaultData = [];

        $form = $this->createFormBuilder($defaultData)
            ->add("company", ChoiceType::class, [
                "label" => "Entreprise",
                "choices" => $tmp
            ])
            ->add("name", TextType::class, ["label" => "Nom de l'offre"])
            ->add("skills", ChoiceType::class, [
                "label" => "Compétences requises pour le poste",
                "choices" => [
                    "Java" => "Java",
                    "Flutter" => "Flutter",
                    "Git" => "Git",
                    "PHP" => "PHP",
                    "Python" => "Python",
                    "NodeJS" => "NodeJS",
                    "C" => "C",
                    "SQL" => "SQL",
                    "Docker" => "Docker",
                    "Anglais" => "Anglais",
                ],
                "expanded"  => true,
                "multiple"  => true,
            ])
            ->add("save", SubmitType::class, ["label" => "Publier l'offre"])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $managerRegistry->getManager();
            $data = $form->getData();
            $offer = new Offer();
            $offer->setIdOffer($faker->numberBetween(0,4));
            $offer->setIdComp($data["company"]);
            $offer->setName($data["name"]);
            $offer->setMatched(false);

            $entityManager->persist($offer);
            $entityManager->flush();

            foreach ($data["skills"] as $skillName) {
                $skill = new SkillOffer();
                $skill->setIdOffer($offer->getId());
                $skill->setName($skillName);

                $entityManager->persist($skill);
                $entityManager->flush();
            }

            //return $this->redirectToRoute("offers");
        }

        return $this->render("offers.html.twig", array(
            "form" => $form->createView(),
            "offers" => $offers, "skills" => [
            "Java", "Flutter", "NodeJS", "PHP", "Git", "Python", "Agile"
            ]
        ));
    }
}
