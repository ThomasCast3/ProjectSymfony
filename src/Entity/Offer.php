<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OfferRepository::class)]
class Offer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Skills::class, inversedBy: "Offers")]
    private Skills $OfferSkill;

    #[ORM\ManyToOne(targetEntity: Company::class, inversedBy: "Offers")]
    private  Company $company;

    #[ORM\Column]
    private ?int $id_comp = null;

    #[ORM\Column]
    private ?bool $matched = null;

    public function __construct(){
        $this->Offers = new ArrayCollection();
    }

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

    /**
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }
}
