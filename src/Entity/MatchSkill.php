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
    private ?int $idUser = null;

    #[ORM\Column]
    private ?int $idOffer = null;

    #[ORM\Column]
    private ?int $SkillMatch = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(?int $id): self
    {
        $this->idUser = $id;
        return $this;
    }

    public function getIdOffer(): ?int
    {
        return $this->idOffer;
    }

    public function setIdOffer(?int $id): self
    {
        $this->idOffer = $id;
        return $this;
    }

    public function getSkillMatch(): ?int
    {
        return $this->SkillMatch;
    }

    public function setSkillMatch(?int $skill): self
    {
        $this->SkillMatch = $skill;
        return $this;
    }
}
