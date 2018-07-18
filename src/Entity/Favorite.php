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
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="User")
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Announce", inversedBy="favorites")
     */
    private $Announce;


    public function __construct()
    {
        $this->User = new ArrayCollection();
        $this->Announce = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }


    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->User;
    }

    public function addUser(User $user): self
    {
        if (!$this->User->contains($user)) {
            $this->User[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->User->contains($user)) {
            $this->User->removeElement($user);
        }

        return $this;
    }

    public function getAnnounce(): ?Announce
    {
        return $this->Announce;
    }

    public function setAnnounce(?Announce $Announce): self
    {
        $this->Announce = $Announce;

        return $this;
    }

}
