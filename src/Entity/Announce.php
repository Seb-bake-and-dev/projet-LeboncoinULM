<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnnounceRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $vitesseMax;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbrHvol;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $yearUlm;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $parachute;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $transponder;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enabled;

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
    /**
     *
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="picture", size="imageSize")
     * @Assert\File(
     * maxSize="2000k",
     * maxSizeMessage="Le fichier excède 2000Ko.",
     * mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"},
     * mimeTypesMessage= "formats autorisés: png, jpeg, jpg, svg, gif"
     * )
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     *
     * @var string
     */
    private $picture;

    /**
     *
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="picture2", size="imageSize")
     * @Assert\File(
     * maxSize="2000k",
     * maxSizeMessage="Le fichier excède 2000Ko.",
     * mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"},
     * mimeTypesMessage= "formats autorisés: png, jpeg, jpg, svg, gif"
     * )
     *
     * @var File
     */
    private $imageFile2;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     *
     * @var string
     */
    private $picture2;

    /**
     *
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="picture3", size="imageSize")
     * @Assert\File(
     * maxSize="2000k",
     * maxSizeMessage="Le fichier excède 2000Ko.",
     * mimeTypes={"image/png", "image/jpeg", "image/jpg", "image/svg+xml", "image/gif"},
     * mimeTypesMessage= "formats autorisés: png, jpeg, jpg, svg, gif"
     * )
     *
     * @var File
     */
    private $imageFile3;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     *
     * @var string
     */
    private $picture3;

    /**
     * @return string
     */
    public function getPicture3(): string
    {
        return $this->picture3;
    }

    /**
     * @param string $picture3
     * @return Announce
     */
    public function setPicture3(string $picture3): Announce
    {
        $this->picture3 = $picture3;
        return $this;
    }

    /**
     * @ORM\Column(type="datetime", nullable = true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $Price;

    /**
     * @ORM\Column(type="date")
     */
    private $DatePost;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="Announce")
     */
    private $announce;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="announces")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Region", inversedBy="announce")
     */
    private $region;

    public function __construct()
    {
        $this->announce = new ArrayCollection();
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile(?File $image = null)
    {
        $this->imageFile = $image;
        if (null !== $image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile2(?File $image = null)
    {
        $this->imageFile2 = $image;
        if (null !== $image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile2(): ?File
    {
        return $this->imageFile2;
    }

    public function setPicture($imageName)
    {
        $this->picture = $imageName;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile3(?File $image = null)
    {
        $this->imageFile3 = $image;
        if (null !== $image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile3(): ?File
    {
        return $this->imageFile3;
    }


    public function setImageSize(int $imageSize)
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getDatePost(): ?\DateTimeInterface
    {
        return $this->DatePost;
    }

    public function setDatePost(\DateTimeInterface $DatePost): self
    {
        $this->DatePost = $DatePost;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getAnnounce(): Collection
    {
        return $this->announce;
    }

    public function addAnnounce(Comment $announce): self
    {
        if (!$this->announce->contains($announce)) {
            $this->announce[] = $announce;
            $announce->setAnnounce($this);
        }

        return $this;
    }

    public function removeAnnounce(Comment $announce): self
    {
        if ($this->announce->contains($announce)) {
            $this->announce->removeElement($announce);
            // set the owning side to null (unless already changed)
            if ($announce->getAnnounce() === $this) {
                $announce->setAnnounce(null);
            }
        }

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

    public function getPicture2(): ?string
    {
        return $this->picture2;
    }

    public function setPicture2(?string $picture2): self
    {
        $this->picture2 = $picture2;

        return $this;
    }


    public function getParachute(): ?bool
    {
        return $this->parachute;
    }

    public function setParachute(?bool $parachute): self
    {
        $this->parachute = $parachute;

        return $this;
    }

    public function getTransponder(): ?bool
    {
        return $this->transponder;
    }

    public function setTransponder(?bool $transponder): self
    {
        $this->transponder = $transponder;

        return $this;
    }


    public function getVitesseMax(): ?int
    {
        return $this->vitesseMax;
    }

    public function setVitesseMax(?int $vitesseMax): self
    {
        $this->vitesseMax = $vitesseMax;

        return $this;
    }

    public function getNbrHvol(): ?int
    {
        return $this->nbrHvol;
    }

    public function setNbrHvol(?int $nbrHvol): self
    {
        $this->nbrHvol = $nbrHvol;

        return $this;
    }

    public function getYearUlm(): ?int
    {
        return $this->yearUlm;
    }

    public function setYearUlm(?int $yearUlm): self
    {
        $this->yearUlm = $yearUlm;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }
}
