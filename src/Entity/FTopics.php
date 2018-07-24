<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FTopicsRepository")
 */
class FTopics
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     */
    private $creator;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subject;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_post;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FMessage", mappedBy="topic")
     */
    private $fMessages;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\FCategorie", inversedBy="Topic")
     */
    private $fCategorie;

    public function __toString()
    {
        return $this->getSubject();
    }

    public function __construct()
    {
        $this->fMessages = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreator(): ?User
    {
        return $this->creator;
    }

    public function setCreator(?User $creator): self
    {
        $this->creator = $creator;

        return $this;
    }


    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getDatePost(): ?\DateTimeInterface
    {
        return $this->date_post;
    }

    public function setDatePost(\DateTimeInterface $date_post): self
    {
        $this->date_post = $date_post;

        return $this;
    }

    /**
     * @return Collection|FMessage[]
     */
    public function getFMessages(): Collection
    {
        return $this->fMessages;
    }

    public function addFMessage(FMessage $fMessage): self
    {
        if (!$this->fMessages->contains($fMessage)) {
            $this->fMessages[] = $fMessage;
            $fMessage->setTopic($this);
        }

        return $this;
    }

    public function removeFMessage(FMessage $fMessage): self
    {
        if ($this->fMessages->contains($fMessage)) {
            $this->fMessages->removeElement($fMessage);
            // set the owning side to null (unless already changed)
            if ($fMessage->getTopic() === $this) {
                $fMessage->setTopic(null);
            }
        }

        return $this;
    }

    public function getFCategorie(): ?FCategorie
    {
        return $this->fCategorie;
    }

    public function setFCategorie(?FCategorie $fCategorie): self
    {
        $this->fCategorie = $fCategorie;

        return $this;
    }
}
