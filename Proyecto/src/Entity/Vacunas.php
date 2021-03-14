<?php

namespace App\Entity;

use App\Repository\VacunasRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=VacunasRepository::class)
 */
class Vacunas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     *  @Assert\NotBlank()
     * @Assert\Type("integer")
     */
    private $dosis;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     */
    private $estatus;

    /**
     * @ORM\Column(type="datetime", columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private $fecha_vacunacion;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     */
    private $observaciones;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personal", inversedBy="vacunas")
     */
    private $personal;
    /**
     * Get the value of personal
     */
    public function getPersonal():?Personal 
    {
        return $this->personal;
    }
    /**
     * Set the value of personal
     *
     * @return  self
     */
    public function setPersonal(Personal $personal)
    {
        $this->personal = $personal;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDosis(): ?int
    {
        return $this->dosis;
    }

    public function setDosis(int $dosis): self
    {
        $this->dosis = $dosis;

        return $this;
    }

    public function getEstatus(): ?string
    {
        return $this->estatus;
    }

    public function setEstatus(string $estatus): self
    {
        $this->estatus = $estatus;

        return $this;
    }

    public function getFechaVacunacion(): ?\DateTimeInterface
    {
        return $this->fecha_vacunacion;
    }

    public function setFechaVacunacion(\DateTimeInterface $fecha_vacunacion): self
    {
        $this->fecha_vacunacion = $fecha_vacunacion;

        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(string $observaciones): self
    {
        $this->observaciones = $observaciones;

        return $this;
    }
}
