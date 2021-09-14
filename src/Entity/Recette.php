<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=RecetteRepository::class)
 */
class Recette
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("recette:read")
     * @Groups("operation:read")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("recette:read")
     * @Groups("operation:read")
     */
    private $resume;


    /**
     * @ORM\OneToMany(targetEntity=Operation::class, mappedBy="recette", orphanRemoval=true)
     * @Groups("recette:read")
     * @Groups("operation:read")
     */
    private $operations;

    /**
     * @ORM\OneToMany(targetEntity=RecetteEntity::class, mappedBy="recettes", orphanRemoval=true)
     * @Groups("recette:read")
     */
    private $recetteEntities;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
        $this->recetteEntities = new ArrayCollection();
    }

 
  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * @return Collection|Operation[]
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operation $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations[] = $operation;
            $operation->setRecette($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->operations->removeElement($operation)) {
            // set the owning side to null (unless already changed)
            if ($operation->getRecette() === $this) {
                $operation->setRecette(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RecetteEntity[]
     */
    public function getRecetteEntities(): Collection
    {
        return $this->recetteEntities;
    }

    public function addRecetteEntity(RecetteEntity $recetteEntity): self
    {
        if (!$this->recetteEntities->contains($recetteEntity)) {
            $this->recetteEntities[] = $recetteEntity;
            $recetteEntity->setRecettes($this);
        }

        return $this;
    }

    public function removeRecetteEntity(RecetteEntity $recetteEntity): self
    {
        if ($this->recetteEntities->removeElement($recetteEntity)) {
            // set the owning side to null (unless already changed)
            if ($recetteEntity->getRecettes() === $this) {
                $recetteEntity->setRecettes(null);
            }
        }

        return $this;
    }




}
