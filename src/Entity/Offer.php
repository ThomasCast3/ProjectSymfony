<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OfferRepository::class)]
class Offer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_comp = null;

    #[ORM\Column]
    private ?bool $matched = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdComp(): ?int
    {
        return $this->id_comp;
    }

    public function setIdComp(int $id_comp): self
    {
        $this->id_comp = $id_comp;

        return $this;
    }

    public function isMatched(): ?bool
    {
        return $this->matched;
    }

    public function setMatched(bool $matched): self
    {
        $this->matched = $matched;

        return $this;
    }
}
