<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectPeopleRepository")
 */
class ProjectPeople
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Responsibility;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getResponsibility(): ?string
    {
        return $this->Responsibility;
    }

    public function setResponsibility(string $Responsibility): self
    {
        $this->Responsibility = $Responsibility;

        return $this;
    }
}
