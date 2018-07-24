<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FCategorieRepository")
 */
class FCategorie
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FTopics", mappedBy="fCategorie")
     */
    private $Topic;

    public function __toString()
    {
        return $this->getName();
    }

    public function __construct()
    {
        $this->Topic = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|FTopics[]
     */
    public function getTopic(): Collection
    {
        return $this->Topic;
    }

    public function addTopic(FTopics $topic): self
    {
        if (!$this->Topic->contains($topic)) {
            $this->Topic[] = $topic;
            $topic->setFCategorie($this);
        }

        return $this;
    }

    public function removeTopic(FTopics $topic): self
    {
        if ($this->Topic->contains($topic)) {
            $this->Topic->removeElement($topic);
            // set the owning side to null (unless already changed)
            if ($topic->getFCategorie() === $this) {
                $topic->setFCategorie(null);
            }
        }

        return $this;
    }
}
