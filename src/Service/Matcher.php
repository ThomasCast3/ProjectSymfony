<?php

namespace App\Service;

use App\Entity\Offer;
use App\Entity\SkillOffer;
use App\Entity\SkillUser;
use App\Entity\User;

class Matcher{

    public function MatcherSkills(User $users, Offer $offers, SkillUser $user_skills, SkillOffer $offer_skills ){

        foreach ($users as $user){
            print ($user);
        }
        foreach ($user_skills as $user_skill){
            print ($user_skill);
        }
        foreach ($offers as $offer){
            print ($offer);
        }
        foreach ($offer_skills as $offer_skill){
            print ($offer_skill);
        }

    }
}