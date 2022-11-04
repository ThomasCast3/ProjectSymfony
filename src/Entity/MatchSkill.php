<?php

namespace App\Entity;

use App\Repository\MatchSkillRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchSkillRepository::class)]
class MatchSkill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IdUser = null;

    #[ORM\Column]
    private ?int $IdOffer = null;

    #[ORM\Column]
    private ?int $SkillMatch = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->IdUser;
    }

    public function setIdUser(int $IdUser): self
    {
        $this->IdUser = $IdUser;

        return $this;
    }

    public function getIdOffer(): ?int
    {
        return $this->IdOffer;
    }

    public function setIdOffer(int $IdOffer): self
    {
        $this->IdOffer = $IdOffer;

        return $this;
    }

    public function getSkillMatch(): ?int
    {
        return $this->SkillMatch;
    }

    public function setSkillMatch(int $SkillMatch): self
    {
        $this->SkillMatch = $SkillMatch;

        return $this;
    }
}
