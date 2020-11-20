<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PriseDeVue
 *
 * @ORM\Table(name="prise_de_vue", indexes={@ORM\Index(name="IDX_3EAEED81B5E42F98", columns={"id_activite_habitat_id"}), @ORM\Index(name="IDX_3EAEED81A74ADF1", columns={"id_habitat_id"})})
 * @ORM\Entity
 */
class PriseDeVue
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
     * @ORM\Column(name="url", type="string", length=25, nullable=false)
     */
    private $url;

    /**
     * @var \Habitat
     *
     * @ORM\ManyToOne(targetEntity="Habitat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_habitat_id", referencedColumnName="id")
     * })
     */
    private $idHabitat;

    /**
     * @var \ActiviteHabitat
     *
     * @ORM\ManyToOne(targetEntity="ActiviteHabitat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_activite_habitat_id", referencedColumnName="id")
     * })
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
