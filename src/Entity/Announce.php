<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnnounceRepository")
 */
class Announce
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeUlm", inversedBy="typeUlm")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Model;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\State", inversedBy="stateUlm")
     * @ORM\JoinColumn(nullable=false)
     */
    private $state;

    public function getId()
    {
        return $this->id;
    }

    public function getType(): ?TypeUlm
    {
        return $this->Type;
    }

    public function setType(?TypeUlm $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->Model;
    }

    public function setModel(string $Model): self
    {
        $this->Model = $Model;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getState(): ?State
    {
        return $this->state;
    }

    public function setState(?State $state): self
    {
        $this->state = $state;

        return $this;
    }
}
