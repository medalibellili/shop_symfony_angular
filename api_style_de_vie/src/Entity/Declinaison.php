<?php

namespace App\Entity;

use App\Repository\DeclinaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=DeclinaisonRepository::class)
 */
class Declinaison
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:product"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:product"})
     */
    private $options;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:product"})
     */
    private $prix;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:product"})
     */
    private $hauteur;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:product"})
     */
    private $largeur;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:product"})
     */
    private $longeur;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:product"})
     */
    private $poids;

    /**
     * @ORM\OneToMany(targetEntity=Stock::class, mappedBy="declinaison",cascade={"persist", "remove"})
     *  @Groups({"read:product"})
     */
    private $stock;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="declinaison")
     * 
     */
    private $product;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read:product"})
     */
    private $taxe;

    public function __construct()
    {
        $this->stock = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getOptions(): ?string
    {
        return $this->options;
    }

    public function setOptions(string $options): self
    {
        $this->options = $options;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getHauteur(): ?float
    {
        return $this->hauteur;
    }

    public function setHauteur(float $hauteur): self
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(float $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getLongeur(): ?float
    {
        return $this->longeur;
    }

    public function setLongeur(float $longeur): self
    {
        $this->longeur = $longeur;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * @return Collection<int, Stock>
     */
    public function getStock(): Collection
    {
        return $this->stock;
    }

    public function addStock(Stock $stock): self
    {
        if (!$this->stock->contains($stock)) {
            $this->stock[] = $stock;
            $stock->setDeclinaison($this);
        }

        return $this;
    }

    public function removeStock(Stock $stock): self
    {
        if ($this->stock->removeElement($stock)) {
            // set the owning side to null (unless already changed)
            if ($stock->getDeclinaison() === $this) {
                $stock->setDeclinaison(null);
            }
        }

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getTaxe(): ?int
    {
        return $this->taxe;
    }

    public function setTaxe(int $taxe): self
    {
        $this->taxe = $taxe;

        return $this;
    }
}
