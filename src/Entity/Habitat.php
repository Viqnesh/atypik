<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Habitat
 *
 * @ORM\Table(name="habitat", indexes={@ORM\Index(name="IDX_3B37B2E876C50E4A", columns={"proprietaire_id"}), @ORM\Index(name="IDX_3B37B2E85BA3388B", columns={"id_type_habitat_id"})})
 * @ORM\Entity
 */
class Habitat
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
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="nb_couchages", type="string", length=25, nullable=false)
     */
    private $nbCouchages;

    /**
     * @var int
     *
     * @ORM\Column(name="capacite", type="integer", nullable=false)
     */
    private $capacite;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=30, nullable=false)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=40, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_publication", type="date", nullable=false)
     */
    private $datePublication;

    /**
     * @var \TypeHabitat
     *
     * @ORM\ManyToOne(targetEntity="TypeHabitat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_type_habitat_id", referencedColumnName="id")
     * })
     */
    private $idTypeHabitat;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="proprietaire_id", referencedColumnName="id")
     * })
     */
    private $proprietaire;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ActiviteHabitat", mappedBy="habitat")
     */
    private $activiteHabitat;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $photo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activiteHabitat = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNbCouchages(): ?string
    {
        return $this->nbCouchages;
    }

    public function setNbCouchages(string $nbCouchages): self
    {
        $this->nbCouchages = $nbCouchages;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): self
    {
        $this->capacite = $capacite;

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

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(\DateTimeInterface $datePublication): self
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    public function getIdTypeHabitat(): ?TypeHabitat
    {
        return $this->idTypeHabitat;
    }

    public function setIdTypeHabitat(?TypeHabitat $idTypeHabitat): self
    {
        $this->idTypeHabitat = $idTypeHabitat;

        return $this;
    }

    public function getProprietaire(): ?User
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?User $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * @return Collection|ActiviteHabitat[]
     */
    public function getActiviteHabitat(): Collection
    {
        return $this->activiteHabitat;
    }

    public function addActiviteHabitat(ActiviteHabitat $activiteHabitat): self
    {
        if (!$this->activiteHabitat->contains($activiteHabitat)) {
            $this->activiteHabitat[] = $activiteHabitat;
            $activiteHabitat->addHabitat($this);
        }

        return $this;
    }

    public function removeActiviteHabitat(ActiviteHabitat $activiteHabitat): self
    {
        if ($this->activiteHabitat->contains($activiteHabitat)) {
            $this->activiteHabitat->removeElement($activiteHabitat);
            $activiteHabitat->removeHabitat($this);
        }

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

}
