<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProprieteHabitat
 *
 * @ORM\Table(name="propriete_habitat", indexes={@ORM\Index(name="IDX_849F5456A74ADF1", columns={"id_habitat_id"}), @ORM\Index(name="IDX_849F54563B9719DD", columns={"id_propriete_id"})})
 * @ORM\Entity
 */
class ProprieteHabitat
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
     * @var string
     *
     * @ORM\Column(name="valeur_propriete", type="string", length=30, nullable=false)
     */
    private $valeurPropriete;

    /**
     * @var \Propriete
     *
     * @ORM\ManyToOne(targetEntity="Propriete")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_propriete_id", referencedColumnName="id")
     * })
     */
    private $idPropriete;

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
