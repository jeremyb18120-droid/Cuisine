<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $intitule;

    /**
     * @ORM\OneToMany(targetEntity=RecetteEntity::class, mappedBy="ingredients", orphanRemoval=true)
     */
    private $recetteEntities;

    public function __construct()
    {
        $this->recetteEntities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

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
            $recetteEntity->setIngredients($this);
        }

        return $this;
    }

    public function removeRecetteEntity(RecetteEntity $recetteEntity): self
    {
        if ($this->recetteEntities->removeElement($recetteEntity)) {
            // set the owning side to null (unless already changed)
            if ($recetteEntity->getIngredients() === $this) {
                $recetteEntity->setIngredients(null);
            }
        }

        return $this;
    }


}
