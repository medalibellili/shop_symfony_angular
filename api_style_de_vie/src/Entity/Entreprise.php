<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\NormalizationContext;
use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;




/**
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"write:entreprise","read:entreprise","read:user", "read:depot"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:entreprise","read:entreprise","read:user", "read:depot"})
     */
    private $raisonSocial;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, unique=true)
     * @Groups({"write:entreprise","read:entreprise","read:user", "read:depot"})
     */
    private $matriculeFiscale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:entreprise","read:entreprise"})
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:entreprise","read:entreprise"})
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:entreprise","read:entreprise"})
     */
    private $fileRne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:entreprise","read:entreprise"})
     */
    private $fileMatricule;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:entreprise","read:entreprise"})
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, unique=true)
     * @Groups({"write:entreprise","read:entreprise"})
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"write:entreprise","read:entreprise","read:user", "read:depot"})
     */
    private $typeEntreprise;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="entreprise", cascade={"persist"})
     * @Groups({"write:entreprise","read:entreprise", "read:depot"})
     */
    private $users;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:entreprise","read:entreprise"})
     */
    private $fileCin;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"write:entreprise","read:entreprise","read:user"})
     */
    private $enable = false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:entreprise","read:entreprise"})
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"write:entreprise","read:entreprise","read:user", "read:depot"})
     */
    private $nameBrand;

    /**
     * @ORM\OneToMany(targetEntity=Depot::class, mappedBy="entreprise",cascade={"persist"})
     */
    private $depots;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->depots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSocial(): ?string
    {
        return $this->raisonSocial;
    }

    public function setRaisonSocial(?string $raisonSocial): self
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }

    public function getMatriculeFiscale(): ?string
    {
        return $this->matriculeFiscale;
    }

    public function setMatriculeFiscale(?string $matriculeFiscale): self
    {
        $this->matriculeFiscale = $matriculeFiscale;

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

    public function getFileRne(): ?string
    {
        return $this->fileRne;
    }

    public function setFileRne(?string $fileRne): self
    {
        $this->fileRne = $fileRne;

        return $this;
    }

    public function getFileMatricule(): ?string
    {
        return $this->fileMatricule;
    }

    public function setFileMatricule(?string $fileMatricule): self
    {
        $this->fileMatricule = $fileMatricule;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(?string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getTypeEntreprise(): ?string
    {
        return $this->typeEntreprise;
    }

    public function setTypeEntreprise(string $typeEntreprise): self
    {
        $this->typeEntreprise = $typeEntreprise;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setEntreprise($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless alread:entreprisey changed)
            if ($user->getEntreprise() === $this) {
                $user->setEntreprise(null);
            }
        }

        return $this;
    }

    public function getFileCin(): ?string
    {
        return $this->fileCin;
    }

    public function setFileCin(?string $fileCin): self
    {
        $this->fileCin = $fileCin;

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

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;
 
        return $this;
    }

    public function getNameBrand(): ?string
    {
        return $this->nameBrand;
    }

    public function setNameBrand(?string $nameBrand): self
    {
        $this->nameBrand = $nameBrand;

        return $this;
    }


    public function setId(int $id): self

    {

        $this->id = $id;




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
            $depot->setEntreprise($this);
        }

        return $this;
    }

    public function removeDepot(Depot $depot): self
    {
        if ($this->depots->removeElement($depot)) {
            // set the owning side to null (unless already changed)
            if ($depot->getEntreprise() === $this) {
                $depot->setEntreprise(null);
            }
        }

        return $this;
    }
}