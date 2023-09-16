<?php

namespace App\Entity;

use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:user","write:entreprise","read:entreprise", "read:product", "read:notification"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     * @Groups({"read:user","write:entreprise","read:entreprise", "read:depot", "read:product", "read:notification"})
     * 
     */
    
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups({"read:user","write:entreprise","read:entreprise"})
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Groups({"read:user","write:entreprise","read:entreprise"})
     */
    private $password;



    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:user","write:entreprise","read:entreprise"})
     */
    private $confirm = false;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read:user","write:entreprise","read:entreprise"})
     */
    private $enable = false;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:fournisseur","write:entreprise","read:entreprise","read:user"})
     */
    private $token;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:user","write:entreprise","read:entreprise"})
     */
    private $civility;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:user","write:entreprise","read:entreprise"})
     */
    private $nomComplet;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:user","write:entreprise","read:entreprise"})
     */
    private $tel;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="users", cascade={"persist"})
     * @Groups({"read:user"})
     */
    private $entreprise;

    /**
     * @ORM\OneToMany(targetEntity=Depot::class, mappedBy="user")
     */
    private $depots;

    /**
     * @ORM\OneToMany(targetEntity=SimpleProduct::class, mappedBy="user")
     */
    private $simpleProducts;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="user")
     */
    private $products;

    /**
     * @ORM\OneToOne(targetEntity=Biography::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $biography;

    /**
     * @ORM\Column(type="boolean")
     */
    private $firstActive = false;

    /**
     * @ORM\OneToMany(targetEntity=Notification::class, mappedBy="idUser")
     */
    private $notifications;

    public function __construct()
    {
        $this->depots = new ArrayCollection();
        $this->simpleProducts = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->notifications = new ArrayCollection();
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
    
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isConfirm(): ?bool
    {
        return $this->confirm;
    }

    public function setConfirm(bool $confirm): self
    {
        $this->confirm = $confirm;

        return $this;
    }

    public function isEnable(): ?bool
    {
        return $this->enable;
    }

    public function setEnable(bool $enable): self
    {
        $this->enable = $enable;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function generateToken(): void
    {
        $this->token = bin2hex(random_bytes(32));
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(? string $civility): self
    {
        $this->civility = $civility;

        return $this;
    }

    public function getNomComplet(): ?string
    {
        return $this->nomComplet;
    }

    public function setNomComplet(?string $nomComplet): self
    {
        $this->nomComplet = $nomComplet;

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

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }
 

    /**
     * @return Collection<int, Depot>
     */
    public function getDepots(): Collection
    {
        return $this->depots;
    }

    public function addDepot(Depot $depot): self
    {
        if (!$this->depots->contains($depot)) {
            $this->depots[] = $depot;
            $depot->setUser($this);
        }

        return $this;
    }

    public function removeDepot(Depot $depot): self
    {
        if ($this->depots->removeElement($depot)) {
            // set the owning side to null (unless already changed)
            if ($depot->getUser() === $this) {
                $depot->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SimpleProduct>
     */
    public function getSimpleProducts(): Collection
    {
        return $this->simpleProducts;
    }

    public function addSimpleProduct(SimpleProduct $simpleProduct): self
    {
        if (!$this->simpleProducts->contains($simpleProduct)) {
            $this->simpleProducts[] = $simpleProduct;
            $simpleProduct->setUser($this);
        }

        return $this;
    }

    public function removeSimpleProduct(SimpleProduct $simpleProduct): self
    {
        if ($this->simpleProducts->removeElement($simpleProduct)) {
            // set the owning side to null (unless already changed)
            if ($simpleProduct->getUser() === $this) {
                $simpleProduct->setUser(null);
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
            $product->setUser($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getUser() === $this) {
                $product->setUser(null);
            }
        }

        return $this;
    }

    public function getBiography(): ?Biography
    {
        return $this->biography;
    }

    public function setBiography(?Biography $biography): self
    {
        // unset the owning side of the relation if necessary
        if ($biography === null && $this->biography !== null) {
            $this->biography->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($biography !== null && $biography->getUser() !== $this) {
            $biography->setUser($this);
        }

        $this->biography = $biography;

        return $this;
    }

    public function isFirstActive(): ?bool
    {
        return $this->firstActive;
    }

    public function setFirstActive(bool $firstActive): self
    {
        $this->firstActive = $firstActive;

        return $this;
    }

    /**
     * @return Collection<int, Notification>
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(Notification $notification): self
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications[] = $notification;
            $notification->setIdUser($this);
        }

        return $this;
    }

    public function removeNotification(Notification $notification): self
    {
        if ($this->notifications->removeElement($notification)) {
            // set the owning side to null (unless already changed)
            if ($notification->getIdUser() === $this) {
                $notification->setIdUser(null);
            }
        }

        return $this;
    }
}