<?php

namespace App\Entity;

use App\Repository\ProprieteHabitatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProprieteHabitatRepository::class)
 */
class ProprieteHabitat
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
    private $valeurPropriete;

    /**
     * @ORM\ManyToOne(targetEntity=Propriete::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idPropriete;

    /**
     * @ORM\ManyToOne(targetEntity=Habitat::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idHabitat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValeurPropriete(): ?string
    {
        return $this->valeurPropriete;
    }

    public function setValeurPropriete(string $valeurPropriete): self
    {
        $this->valeurPropriete = $valeurPropriete;

        return $this;
    }

    public function getIdPropriete(): ?Propriete
    {
        return $this->idPropriete;
    }

    public function setIdPropriete(?Propriete $idPropriete): self
    {
        $this->idPropriete = $idPropriete;

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
}
