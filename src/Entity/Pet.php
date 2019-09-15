<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PetRepository")
 */
class Pet
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
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number_puce;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="pets")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type", inversedBy="pets")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sexe", inversedBy="pets")
     */
    private $sexe;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $adopt_date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sterilisy;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Weight", inversedBy="pets")
     */
    private $weight;

    public function __toString()
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->created_at = new \DateTime;
        $this->updated_at = new \DateTime;
        $this->weight = new ArrayCollection();
    }

    public function getId(): ?int
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

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getNumberPuce(): ?int
    {
        return $this->number_puce;
    }

    public function setNumberPuce(?int $number_puce): self
    {
        $this->number_puce = $number_puce;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

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

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSexe(): ?Sexe
    {
        return $this->sexe;
    }

    public function setSexe(?Sexe $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getAdoptDate(): ?\DateTimeInterface
    {
        return $this->adopt_date;
    }

    public function setAdoptDate(?\DateTimeInterface $adopt_date): self
    {
        $this->Adopt_date = $adopt_date;

        return $this;
    }

    public function getSterilisy(): ?bool
    {
        return $this->sterilisy;
    }

    public function setSterilisy(bool $sterilisy): self
    {
        $this->sterilisy = $sterilisy;

        return $this;
    }

    /**
     * @return Collection|Weight[]
     */
    public function getWeight(): Collection
    {
        return $this->weight;
    }

    public function addWeight(Weight $weight): self
    {
        if (!$this->weight->contains($weight)) {
            $this->weight[] = $weight;
        }

        return $this;
    }

    public function removeWeight(Weight $weight): self
    {
        if ($this->weight->contains($weight)) {
            $this->weight->removeElement($weight);
        }

        return $this;
    }
}
