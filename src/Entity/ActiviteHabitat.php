<?php

namespace App\Entity;

use App\Repository\ActiviteHabitatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActiviteHabitatRepository::class)
 */
class ActiviteHabitat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $adresse;

    /**
     * @ORM\Column(type="float")
     */
    private $distance;
    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Activite::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeActivite;

    /**
     * @ORM\ManyToMany(targetEntity=Habitat::class)
     */
    private $idHabitat;

    public function __construct()
    {
        $this->idHabitat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }

    public function setDistance(float $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getTypeActivite(): ?Activite
    {
        return $this->typeActivite;
    }

    public function setTypeActivite(?Activite $typeActivite): self
    {
        $this->typeActivite = $typeActivite;

        return $this;
    }

    /**
     * @return Collection|Habitat[]
     */
    public function getIdHabitat(): Collection
    {
        return $this->idHabitat;
    }

    public function addIdHabitat(Habitat $idHabitat): self
    {
        if (!$this->idHabitat->contains($idHabitat)) {
            $this->idHabitat[] = $idHabitat;
        }

        return $this;
    }

    public function removeIdHabitat(Habitat $idHabitat): self
    {
        if ($this->idHabitat->contains($idHabitat)) {
            $this->idHabitat->removeElement($idHabitat);
        }

        return $this;
    }
}
