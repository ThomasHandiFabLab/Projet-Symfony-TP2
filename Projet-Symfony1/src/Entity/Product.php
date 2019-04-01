<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
    private $Name;

    /**
     * @ORM\Column(type="text")
     */
    private $Slug;

    /**
     * @Assert\NotBlank( message = "Vous devez saisir une description." )
     * @Assert\Length(
     *      min = 10,
     *      minMessage = "La description de l'événement doit compter au minimum {{ limit }} caractères"
     * )
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @Assert\Type(
     *     type="float",
     *     message="Vous devez saisir un prix valide"
     * @Assert\NotBlank( message = "Vous devez saisir une description" )
     * @Assert\Length(
     *      min = 99,
     *      max = X,
     *      minMessage = "Votre description doit contenir au moins {{ limit }} caractères",
     *      maxMessage = "Votre description doit contenir au maximum {{ limit }} caractères"
     * )
     * )
     * @ORM\Column(type="float")
     */
    private $Price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->Slug;
    }

    public function setSlug(string $Slug): self
    {
        $this->Slug = $Slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }
}
