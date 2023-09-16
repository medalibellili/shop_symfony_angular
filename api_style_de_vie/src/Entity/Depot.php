<?php

namespace App\Entity;

use App\Repository\DepotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=DepotRepository::class)
 */
class Depot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:depot", "read:withStock", "read:product"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:depot", "read:withStock", "read:product"})
     */
    private $nomDepot;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:depot", "read:withStock", "read:product"})
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:depot", "read:withStock", "read:product"})
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:depot", "read:withStock", "read:product"})
     */
    private $tel;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:depot", "read:withStock", "read:product"})
     */
    private $longitude;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read:depot", "read:withStock", "read:product"})
     */
    private $latitude;

    /**
     * @ORM\OneToMany(targetEntity=Stock::class, mappedBy="depot",cascade={"persist"})
     * @Groups({"read:depot"})
     */
    private $stocks;

     

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="depots",cascade={"persist"})
     * @Groups({"read:depot"})
     */
    private $entreprise;


    public function __construct()
    {
        $this->simpleProducts = new ArrayCollection();
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

    public function getNomDepot(): ?string
    {
        return $this->nomDepot;
    }

    public function setNomDepot(string $nomDepot): self
    {
        $this->nomDepot = $nomDepot;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

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
            $stock->setDepot($this);
        }

        return $this;
    }

    public function removeStock(Stock $stock): self
    {
        if ($this->stocks->removeElement($stock)) {
            // set the owning side to null (unless already changed)
            if ($stock->getDepot() === $this) {
                $stock->setDepot(null);
            }
        }

        return $this;
    }

   

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

}
