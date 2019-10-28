<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartmentRepository")
 */
class Department
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
    private $Title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Team_lead;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="departments")
     */
    private $company;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ProjectPeople", inversedBy="departments")
     */
    private $projectPeople;

    public function __construct()
    {
        $this->projectPeople = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

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

    public function getTeamLead(): ?string
    {
        return $this->Team_lead;
    }

    public function setTeamLead(string $Team_lead): self
    {
        $this->Team_lead = $Team_lead;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return Collection|ProjectPeople[]
     */
    public function getProjectPeople(): Collection
    {
        return $this->projectPeople;
    }

    public function addProjectPerson(ProjectPeople $projectPerson): self
    {
        if (!$this->projectPeople->contains($projectPerson)) {
            $this->projectPeople[] = $projectPerson;
        }

        return $this;
    }

    public function removeProjectPerson(ProjectPeople $projectPerson): self
    {
        if ($this->projectPeople->contains($projectPerson)) {
            $this->projectPeople->removeElement($projectPerson);
        }

        return $this;
    }
}
