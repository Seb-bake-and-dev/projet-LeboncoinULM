<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeUlmRepository")
 */
class TypeUlm
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
    private $Type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Announce", mappedBy="Type", orphanRemoval=true)
     */
    private $Marque;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Announce", mappedBy="Type")
     */
    private $typeUlm;

    public function __construct()
    {
        $this->Marque = new ArrayCollection();
        $this->typeUlm = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }
    public function __toString()
    {
        return $this->getType();
    }

    /**
     * @return Collection|Announce[]
     */
    public function getTypeUlm(): Collection
    {
        return $this->typeUlm;
    }

    public function addTypeUlm(Announce $typeUlm): self
    {
        if (!$this->typeUlm->contains($typeUlm)) {
            $this->typeUlm[] = $typeUlm;
            $typeUlm->setType($this);
        }

        return $this;
    }

    public function removeTypeUlm(Announce $typeUlm): self
    {
        if ($this->typeUlm->contains($typeUlm)) {
            $this->typeUlm->removeElement($typeUlm);
            // set the owning side to null (unless already changed)
            if ($typeUlm->getType() === $this) {
                $typeUlm->setType(null);
            }
        }

        return $this;
    }

}

