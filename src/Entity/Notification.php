<?php

namespace App\Entity;

use App\Repository\NotificationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NotificationRepository::class)
 */
class Notification
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

<<<<<<< HEAD
    /**
     * @ORM\Column(type="string", length=45)
     */
    private $title;

=======
>>>>>>> parent of 09ac319... Commit 3
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
<<<<<<< HEAD

    public function getTitle(): ?string
    {
        return $this->title;
    }

<<<<<<< HEAD
=======
>>>>>>> parent of 09ac319... Commit 3
=======
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
>>>>>>> parent of 8e46fcd... Ajout fonctionnalités
}
