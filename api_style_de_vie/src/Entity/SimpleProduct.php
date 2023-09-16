<?php

namespace App\Entity;

use App\Repository\SimpleProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SimpleProductRepository::class)
 */
class SimpleProduct
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"write:simpleProduct","read:simpleProduct", "read:withStock"})
     */
    private $id;

    /**
     * @ORM\Column(type="float", length=11, nullable=true)
     * @Groups({"write:simpleProduct","read:simpleProduct","read:product", "read:withStock"})
     */
    private $prix;

    /**
     * @ORM\Column(type="float", length=255, nullable=true)
     * @Groups({"write:simpleProduct","read:simpleProduct", "read:withStock","read:product"})
     */
    private $taxe;

    /**
     * @ORM\Column(type="float", length=255, nullable=true)
     * @Groups({"write:simpleProduct","read:simpleProduct", "read:withStock","read:product"})
     */
    private $hauteur;

    /**
     * @ORM\Column(type="float", length=255, nullable=true)
     * @Groups({"write:simpleProduct","read:simpleProduct", "read:withStock","read:product"})
     */
    private $longeur;

    /**
     * @ORM\Column(type="float", length=255, nullable=true)
     * @Groups({"write:simpleProduct","read:simpleProduct", "read:withStock","read:product"})
     */
    private $largeur;

    /**
     * @ORM\Column(type="float", length=255, nullable=true)
     * @Groups({"write:simpleProduct","read:simpleProduct", "read:withStock","read:product"})
     */
    private $poids;

    /**
     * @ORM\Column(type="integer", length=255, nullable=true)
     * @Groups({"write:simpleProduct","read:simpleProduct","read:product", "read:withStock"})
     */
    private $quantite;
    
    /**
     * @ORM\OneToOne(targetEntity=Product::class, inversedBy="simpleProduct", cascade={"persist", "remove"})
     */
    private $simples;

    /**
     * @ORM\ManyToMany(targetEntity=Depot::class, inversedBy="simpleProducts")
     */
    private $depot;

    /**
     * @ORM\OneToMany(targetEntity=Stock::class, mappedBy="simpleProduct")
     * @Groups({"read:withStock"})
     */
    private $stocks;

    public function __construct()
    {
        $this->depot = new ArrayCollection();
        $this->stocks = new ArrayCollection();
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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getTaxe(): ?float
    {
        return $this->taxe;
    }

    public function setTaxe(float $taxe): self
    {
        $this->taxe = $taxe;

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

    public function getLongeur(): ?float
    {
        return $this->longeur;
    }

    public function setLongeur(float $longeur): self
    {
        $this->longeur = $longeur;

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

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getSimples(): ?Product
    {
        return $this->simples;
    }

    public function setSimples(?Product $simples): self
    {
        $this->simples = $simples;

        return $this;
    }

    /**
     * @return Collection<int, Depot>
     */
    public function getDepot(): Collection
    {
        return $this->depot;
    }

    public function addDepot(Depot $depot): self
    {
        if (!$this->depot->contains($depot)) {
            $this->depot[] = $depot;
        }

        return $this;
    }

    public function removeDepot(Depot $depot): self
    {
        $this->depot->removeElement($depot);

        return $this;
    }

    /**
     * @return Collection<int, Stock>
     */
    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    public function addStock(Stock $stock): self
    {
        if (!$this->stocks->contains($stock)) {
            $this->stocks[] = $stock;
            $stock->setSimpleProduct($this);
        }

        return $this;
    }

    public function removeStock(Stock $stock): self
    {
        if ($this->stocks->removeElement($stock)) {
            // set the owning side to null (unless already changed)
            if ($stock->getSimpleProduct() === $this) {
                $stock->setSimpleProduct(null);
            }
        }

        return $this;
    }


}