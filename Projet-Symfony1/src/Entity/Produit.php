<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Produit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank( message = "Vous devez saisir un nom" )
     * @Assert\Length(
     *      min = 3,
     *      minMessage = "Le nom de l'événement doit compter au minimum {{ limit }} caractères"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $slug;

    /**
     * @Assert\NotBlank( message = "Vous devez saisir une description." )
     * @Assert\Length(
     *      min = 10,
     *      minMessage = "La description de l'événement doit compter au minimum {{ limit }} caractères"
     * )
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @Assert\Type(
     *     type="float",
     *     message="Vous devez saisir un prix valide")
     * @Assert\NotBlank( message = "Vous devez saisir une description" )
     * @Assert\Length(
     *      min = 99,
     *      max = 1000000000,
     *      minMessage = "Votre description doit contenir au moins {{ limit }} caractères",
     *      maxMessage = "Votre description doit contenir au maximum {{ limit }} caractères"
     * )
     * @ORM\Column(type="float")
     */
    private $price;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $Slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
