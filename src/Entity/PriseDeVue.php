<?php

namespace App\Entity;

use App\Repository\PriseDeVueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PriseDeVueRepository::class)
 */
class PriseDeVue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity=Habitat::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idHabitat;

    /**
     * @ORM\ManyToOne(targetEntity=ActiviteHabitat::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idActiviteHabitat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getIdHabitat(): ?Habitat
    {
        return $this->idHabitat;
    }

    public function setIdHabitat(?Habitat $idHabitat): self
    {
        $this->idHabitat = $idHabitat;

        return $this;
    }

    public function getIdActiviteHabitat(): ?ActiviteHabitat
    {
        return $this->idActiviteHabitat;
    }

    public function setIdActiviteHabitat(?ActiviteHabitat $idActiviteHabitat): self
    {
        $this->idActiviteHabitat = $idActiviteHabitat;

        return $this;
    }
}
