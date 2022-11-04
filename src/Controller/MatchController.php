<?php

namespace App\Controller;

use App\Entity\MatchSkill;
use App\Entity\SkillOffer;
use App\Entity\User;
use App\Service\Matcher;
//use App\Entity\Company;
use App\Entity\Offer;
//use App\Entity\SkillOffer;
use App\Entity\SkillUser;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatchController extends AbstractController
{
    #[Route('/match')]
    public function main(ManagerRegistry $doctrine): Response {
        $db_offers = $doctrine->getRepository(Offer::class)->findAll();
        $db_offerSkills = $doctrine->getRepository(SkillOffer::class)->findAll();
        $db_users = $doctrine->getRepository(User::class)->findAll();
        $db_userSkills = $doctrine->getRepository(SkillUser::class)->findAll();
        $this->MatcherSkills($doctrine,$db_users, $db_offers, $db_userSkills, $db_offerSkills);

        return $this->render('match.html.twig', array("offers" => $db_offers,"offer_skills" => $db_offerSkills,"users" => $db_users,"offer_users" => $db_userSkills));
    }

    private function MatcherSkills(ManagerRegistry $manager,array $users, array $offers, array $user_skills, array $offer_skills)
    {

        for ($offer=0;$offer<count($offers);$offer ++){
            $O_skills = [];
            for ($offer_skill=0;$offer_skill<count($offer_skills);$offer_skill++){
                if($offers[$offer]->getIdOffer()==$offer_skills[$offer_skill]->getIdOffer()) {
                    array_push($O_skills,$offer_skills[$offer_skill]);
                }
            }
            for($user=0;$user<count($users);$user++){

                $U_skills = [];
                for ($user_skill=0;$user_skill<count($user_skills);$user_skill++){
                    if($users[$user]->getIdUser()==$user_skills[$user_skill]->getIdUser()) {
                        array_push($U_skills,$user_skills[$user_skill]);
                    }
                }
                $countMatch = 0;
                for ($i=0;$i<count($U_skills);$i++){
                    for ($y=0;$y<count($O_skills);$y++){
                        if($U_skills[$i]->getName() ==  $O_skills[$y]->getName()){
                            $countMatch+=1;
                        }
                    }
                }
                if($countMatch>1){
                    $match = new MatchSkill();
                    $match->setIdUser($users[$user]->getIdUser());
                    $match->setIdOffer($offers[$offer]->getIdOffer());
                    $match->setSkillMatch($countMatch);
                    $entityManager= $manager->getManager();
                    $entityManager->persist($match);
                    $entityManager->flush();
                }
            }
        }
    }


}