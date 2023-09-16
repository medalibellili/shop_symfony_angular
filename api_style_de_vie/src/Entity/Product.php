<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $idOdoo;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $nomProduit;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $shortDescription;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $longDescription;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $linkVideo;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="products", cascade={"persist","remove"})
     * @Groups({"write:product","read:product"})
     */
    private $categories;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $metaTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $metaDescription;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $metaKeyword;

    /**
     * @ORM\OneToOne(targetEntity=SimpleProduct::class, mappedBy="simples", cascade={"persist", "remove"})
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $simpleProduct;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @Groups({"read:product"})
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable = true)
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $reference;

    /**
     * @ORM\OneToMany(targetEntity=ProductGallery::class, mappedBy="product",cascade={"persist", "remove"})
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $productGalleries;

    /**
     * @ORM\OneToMany(targetEntity=Declinaison::class, mappedBy="product",cascade={"persist", "remove"})
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $declinaison;

    /**
     * @ORM\Column(type="text", nullable = true)
     * @Groups({"write:product","read:product", "read:withStock"})
     */
    private $selectedAttributes;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->productGalleries = new ArrayCollection();
        $this->declinaison = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
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

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getLongDescription(): ?string
    {
        return $this->longDescription;
    }

    public function setLongDescription(string $longDescription): self
    {
        $this->longDescription = $longDescription;

        return $this;
    }


    public function getLinkVideo(): ?string
    {
        return $this->linkVideo;
    }

    public function setLinkVideo(?string $linkVideo): self
    {
        $this->linkVideo = $linkVideo;

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->categories->removeElement($category);

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    public function setMetaTitle(string $metaTitle): self
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(string $metaDescription): self
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    public function getMetaKeyword(): ?string
    {
        return $this->metaKeyword;
    }

    public function setMetaKeyword(string $metaKeyword): self
    {
        $this->metaKeyword = $metaKeyword;

        return $this;
    }

    public function getSimpleProduct(): ?SimpleProduct
    {
        return $this->simpleProduct;
    }

    public function setSimpleProduct(?SimpleProduct $simpleProduct): self
    {
        // unset the owning side of the relation if necessary
        if ($simpleProduct === null && $this->simpleProduct !== null) {
            $this->simpleProduct->setSimples(null);
        }

        // set the owning side of the relation if necessary
        if ($simpleProduct !== null && $simpleProduct->getSimples() !== $this) {
            $simpleProduct->setSimples($this);
        }

        $this->simpleProduct = $simpleProduct;

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

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return Collection<int, ProductGallery>
     */
    public function getProductGalleries(): Collection
    {
        return $this->productGalleries;
    }

    public function addProductGallery(ProductGallery $productGallery): self
    {
        if (!$this->productGalleries->contains($productGallery)) {
            $this->productGalleries[] = $productGallery;
            $productGallery->setProduct($this);
        }

        return $this;
    }

    public function removeProductGallery(ProductGallery $productGallery): self
    {
        if ($this->productGalleries->removeElement($productGallery)) {
            // set the owning side to null (unless already changed)
            if ($productGallery->getProduct() === $this) {
                $productGallery->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Declinaison>
     */
    public function getDeclinaison(): Collection
    {
        return $this->declinaison;
    }

    public function addDeclinaison(Declinaison $declinaison): self
    {
        if (!$this->declinaison->contains($declinaison)) {
            $this->declinaison[] = $declinaison;
            $declinaison->setProduct($this);
        }

        return $this;
    }

    public function removeDeclinaison(Declinaison $declinaison): self
    {
        if ($this->declinaison->removeElement($declinaison)) {
            // set the owning side to null (unless already changed)
            if ($declinaison->getProduct() === $this) {
                $declinaison->setProduct(null);
            }
        }

        return $this;
    }

    public function getSelectedAttributes(): ?string
    {
        return $this->selectedAttributes;
    }

    public function setSelectedAttributes(?string $selectedAttributes): self
    {
        $this->selectedAttributes = $selectedAttributes;

        return $this;
    }


  

     
}