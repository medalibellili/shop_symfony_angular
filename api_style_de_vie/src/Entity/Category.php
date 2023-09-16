<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"write:category","read:category","read:product"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"write:category","read:category","read:product"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     * @Groups({"write:category","read:category"})
     */
    private $description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"write:category","read:category"})
     */
    private $enable = false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:category","read:category"})
     */
    private $picto;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Groups({"write:category","read:category"})
     */
    private $idOdoo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"write:category","read:category"})
     */
    private $orderTri;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:category","read:category"})
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:category","read:category"})
     */
    private $metaTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:category","read:category"})
     */
    private $metaDescription;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:category","read:category"})
     */
    private $metaKeyword;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="categories", cascade={"persist"})
     */
    private $categoryParent;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="categoryParent", cascade={"persist","remove"})
     * @Groups({"write:category","read:category"})
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, mappedBy="categories")
     */
    private $products;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->products = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function isEnable(): ?bool
    {
        return $this->enable;
    }

    public function setEnable(?bool $enable): self
    {
        $this->enable = $enable;

        return $this;
    }

    public function getPicto(): ?string
    {
        return $this->picto;
    }

    public function setPicto(?string $picto): self
    {
        $this->picto = $picto;

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

    public function getOrderTri(): ?int
    {
        return $this->orderTri;
    }

    public function setOrderTri(?int $orderTri): self
    {
        $this->orderTri = $orderTri;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    public function setMetaTitle(?string $metaTitle): self
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription): self
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    public function getMetaKeyword(): ?string
    {
        return $this->metaKeyword;
    }

    public function setMetaKeyword(?string $metaKeyword): self
    {
        $this->metaKeyword = $metaKeyword;

        return $this;
    }

    public function getCategoryParent(): ?self
    {
        return $this->categoryParent;
    }

    public function setCategoryParent(?self $categoryParent): self
    {
        $this->categoryParent = $categoryParent;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(self $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setCategoryParent($this);
        }

        return $this;
    }

    public function removeCategory(self $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getCategoryParent() === $this) {
                $category->setCategoryParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removeCategory($this);
        }

        return $this;
    }
}

