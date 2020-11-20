<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planning
 *
 * @ORM\Table(name="planning", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_D499BFF6A74ADF1", columns={"id_habitat_id"})})
 * @ORM\Entity
 */
class Planning
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="jour", type="integer", nullable=false)
     */
    private $jour;

    /**
     * @var int
     *
     * @ORM\Column(name="mois", type="integer", nullable=false)
     */
    private $mois;

    /**
     * @var int
     *
     * @ORM\Column(name="annee", type="integer", nullable=false)
     */
    private $annee;

    /**
     * @var \Habitat
     *
     * @ORM\ManyToOne(targetEntity="Habitat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_habitat_id", referencedColumnName="id")
     * })
     */
    private $idHabitat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?int
    {
        return $this->jour;
    }

    public function setJour(int $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getMois(): ?int
    {
        return $this->mois;
    }

    public function setMois(int $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

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
