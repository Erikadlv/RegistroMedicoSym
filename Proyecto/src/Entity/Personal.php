<?php

namespace App\Entity;

use App\Repository\PersonalRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=PersonalRepository::class)
 */
class Personal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(max=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type("integer")
     * @Assert\NotBlank()
     */
    private $edad;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    private $departamento;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    private $cargo;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type("integer")
     * @Assert\NotBlank()
     */
    private $sueldo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vacunas", mappedBy="personal")
     */
    private $vacunas;
    /**
     * Get the value of vacunas
     */
    public function getVacunas()
    {
        return $this->vacunas;
    }
    /**
     * Set the value of vacunas
     *
     * @return  self
     */
    public function setVacunas($vacunas)
    {
        $this->vacunas = $vacunas;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getDepartamento(): ?string
    {
        return $this->departamento;
    }

    public function setDepartamento(string $departamento): self
    {
        $this->departamento = $departamento;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    public function setCargo(string $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getSueldo(): ?int
    {
        return $this->sueldo;
    }

    public function setSueldo(int $sueldo): self
    {
        $this->sueldo = $sueldo;

        return $this;
    }
}
