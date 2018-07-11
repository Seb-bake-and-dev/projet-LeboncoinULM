<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StateRepository")
 */
class State
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $state;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Announce", mappedBy="state")
     */
    private $stateUlm;

    public function __construct()
    {
        $this->stateUlm = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return Collection|Announce[]
     */
    public function getStateUlm(): Collection
    {
        return $this->stateUlm;
    }

    public function addStateUlm(Announce $stateUlm): self
    {
        if (!$this->stateUlm->contains($stateUlm)) {
            $this->stateUlm[] = $stateUlm;
            $stateUlm->setState($this);
        }

        return $this;
    }

    public function removeStateUlm(Announce $stateUlm): self
    {
        if ($this->stateUlm->contains($stateUlm)) {
            $this->stateUlm->removeElement($stateUlm);
            // set the owning side to null (unless already changed)
            if ($stateUlm->getState() === $this) {
                $stateUlm->setState(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getState();
    }
}
