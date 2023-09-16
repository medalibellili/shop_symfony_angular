<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=StockRepository::class)
 */
class Stock
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:depot", "read:withStock", "read:product"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read:depot", "read:withStock", "read:product"})
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity=SimpleProduct::class, inversedBy="stocks")
     */
    private $simpleProduct;

     /**
     * @ORM\ManyToOne(targetEntity=Declinaison::class, inversedBy="stock")
     *
     */
    private $declinaison;

    /**
     * @ORM\ManyToOne(targetEntity=Depot::class, inversedBy="stocks", cascade={"persist"})
     * @Groups({"read:withStock", "read:product"})
     */
    private $depot;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

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

    public function getSimpleProduct(): ?SimpleProduct
    {
        return $this->simpleProduct;
    }

    public function setSimpleProduct(?SimpleProduct $simpleProduct): self
    {
        $this->simpleProduct = $simpleProduct;

        return $this;
    }


    public function getDeclinaison(): ?Declinaison
    {
        return $this->declinaison;
    }

    public function setDeclinaison(?Declinaison $declinaison): self
    {
        $this->declinaison = $declinaison;

        return $this;
    }

    public function getDepot(): ?Depot
    {
        return $this->depot;
    }

    public function setDepot(?Depot $depot): self
    {
        $this->depot = $depot;

        return $this;
    }
}

