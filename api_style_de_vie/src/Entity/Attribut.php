<?php

namespace App\Entity;

use App\Repository\AttributRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=AttributRepository::class)
 */
class Attribut
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"write:attribut","read:attribut"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:attribut","read:attribut"})
     */
    private $idOdoo;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"write:attribut","read:attribut"})
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"write:attribut","read:attribut"})
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"write:attribut","read:attribut"})
     */
    private $position;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"write:attribut","read:attribut"})
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=Value::class, mappedBy="attribut", cascade={"persist","remove"})
     * @Groups({"write:attribut","read:attribut"})
     */
    private $valeurs;

    public function __construct()
    {
        $this->valeurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdOdoo(): ?string
    {
        return $this->idOdoo;
    }

    public function setIdOdoo(?string $idOdoo): self
    {
        $this->idOdoo = $idOdoo;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Value>
     */
    public function getValeurs(): Collection
    {
        return $this->valeurs;
    }

    public function addValeur(Value $valeur): self
    {
        if (!$this->valeurs->contains($valeur)) {
            $this->valeurs[] = $valeur;
            $valeur->setAttribut($this);
        }

        return $this;
    }

    public function removeValeur(Value $valeur): self
    {
        if ($this->valeurs->removeElement($valeur)) {
            // set the owning side to null (unless already changed)
            if ($valeur->getAttribut() === $this) {
                $valeur->setAttribut(null);
            }
        }

        return $this;
    }
}

