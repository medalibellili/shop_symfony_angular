<?php

namespace App\Entity;

use App\Repository\BiographyRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=BiographyRepository::class)
 */
class Biography
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:biography"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:biography"})
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read:biography"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:biography"})
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:biography"})
     */
    private $links;

 

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:biography"})
     */
    private $linkFacebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:biography"})
     */
    private $linkTiktok;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:biography"})
     */
    private $linkInstagram;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:biography"})
     */
    private $linkLinkedin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:biography"})
     */
    private $linkTwiter;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="biography", cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getLinks(): ?string
    {
        return $this->links;
    }

    public function setLinks(?string $links): self
    {
        $this->links = $links;

        return $this;
    }

 

    public function getLinkFacebook(): ?string
    {
        return $this->linkFacebook;
    }

    public function setLinkFacebook(?string $linkFacebook): self
    {
        $this->linkFacebook = $linkFacebook;

        return $this;
    }

    public function getLinkTiktok(): ?string
    {
        return $this->linkTiktok;
    }

    public function setLinkTiktok(?string $linkTiktok): self
    {
        $this->linkTiktok = $linkTiktok;

        return $this;
    }

    public function getLinkInstagram(): ?string
    {
        return $this->linkInstagram;
    }

    public function setLinkInstagram(?string $linkInstagram): self
    {
        $this->linkInstagram = $linkInstagram;

        return $this;
    }

    public function getLinkLinkedin(): ?string
    {
        return $this->linkLinkedin;
    }

    public function setLinkLinkedin(?string $linkLinkedin): self
    {
        $this->linkLinkedin = $linkLinkedin;

        return $this;
    }

    public function getLinkTwiter(): ?string
    {
        return $this->linkTwiter;
    }

    public function setLinkTwiter(?string $linkTwiter): self
    {
        $this->linkTwiter = $linkTwiter;

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
}