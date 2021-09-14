<?php

namespace App\Entity;

use App\Repository\RecetteEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecetteEntityRepository::class)
 */
class RecetteEntity
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
    private $unite;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Recette::class, inversedBy="recetteEntities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $recettes;

    /**
     * @ORM\ManyToOne(targetEntity=Ingredient::class, inversedBy="recetteEntities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ingredients;



    public function __construct()
    {
        $this->recettes = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
        $this->Recettes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(string $unite): self
    {
        $this->unite = $unite;

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

    public function getRecettes(): ?Recette
    {
        return $this->recettes;
    }

    public function setRecettes(?Recette $recettes): self
    {
        $this->recettes = $recettes;

        return $this;
    }

    public function getIngredients(): ?Ingredient
    {
        return $this->ingredients;
    }

    public function setIngredients(?Ingredient $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

}
