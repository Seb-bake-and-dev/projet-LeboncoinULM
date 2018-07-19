<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FavoriteRepository")
 */
class Favorite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Announce", inversedBy="favorites")
     */
    private $Announce;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="favorites")
     */
    private $user;


    public function __construct()
    {
        $this->User = new ArrayCollection();
        $this->Announce = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }


    public function getAnnounce()
    {
        return $this->Announce;
    }

    public function setAnnounce(?Announce $Announce): self
    {
        $this->Announce = $Announce;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active): void
    {
        $this->active = $active;
    }
}
