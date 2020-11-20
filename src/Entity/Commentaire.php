<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_67F068BC79F37AE5", columns={"id_user_id"})}, indexes={@ORM\Index(name="IDX_67F068BCA74ADF1", columns={"id_habitat_id"})})
 * @ORM\Entity
 */
class Commentaire
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
     * @ORM\Column(name="contenu", type="text", length=0, nullable=false)
     */
    private $contenu;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user_id", referencedColumnName="id")
     * })
     */
    private $idUser;

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

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

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
