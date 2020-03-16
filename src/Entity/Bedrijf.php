<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BedrijfRepository")
 */
class Bedrijf
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $plaats;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vacature", mappedBy="bedrijf", orphanRemoval=true)
     * @MaxDepth(2)
     */
    private $vacatures;

    public function __construct()
    {
        $this->vacature = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getPlaats(): ?string
    {
        return $this->plaats;
    }

    public function setPlaats(string $plaats): self
    {
        $this->plaats = $plaats;

        return $this;
    }

    /**
     * @return Collection|Vacature[]
     */
    public function getVacatures(): Collection
    {
        return $this->vacatures;
    }

    public function addVacature(Vacature $vacature): self
    {
        if (!$this->vacatures->contains($vacature)) {
            $this->vacatures[] = $vacature;
            $vacature->setBedrijf($this);
        }

        return $this;
    }

    public function removeVacature(Vacature $vacature): self
    {
        if ($this->vacatures->contains($vacature)) {
            $this->vacatures->removeElement($vacature);
            // set the owning side to null (unless already changed)
            if ($vacature->getBedrijf() === $this) {
                $vacature->setBedrijf(null);
            }
        }

        return $this;
    }
}
