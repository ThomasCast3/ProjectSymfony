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
    private ?int $id_offer = null;

    #[ORM\Column]
    private ?int $id_comp = null;

    #[ORM\Column]
    private ?bool $matched = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdOffer(): ?int
    {
        return $this->id_offer;
    }

    public function setIdOffer(int $id_offer): self
    {
        $this->id_offer = $id_offer;

        return $this;
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

    public function  __toString(): string
    {
        // TODO: Implement __toString() method.
        $result =  $this->id_comp;
        return (string)$result;
    }
}
