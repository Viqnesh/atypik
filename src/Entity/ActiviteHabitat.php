<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActiviteHabitat
 *
 * @ORM\Table(name="activite_habitat", indexes={@ORM\Index(name="IDX_7191756DD0165F20", columns={"type_activite_id"})})
 * @ORM\Entity
 */
class ActiviteHabitat
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
     * @ORM\Column(name="adresse", type="string", length=30, nullable=false)
     */
    private $adresse;

    /**
     * @var float
     *
     * @ORM\Column(name="distance", type="float", precision=10, scale=0, nullable=false)
     */
    private $distance;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \Activite
     *
     * @ORM\ManyToOne(targetEntity="Activite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_activite_id", referencedColumnName="id")
     * })
     */
    private $typeActivite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Habitat", inversedBy="activiteHabitat")
     * @ORM\JoinTable(name="activite_habitat_habitat",
     *   joinColumns={
     *     @ORM\JoinColumn(name="activite_habitat_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="habitat_id", referencedColumnName="id")
     *   }
     * )
     */
    private $habitat;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->habitat = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
