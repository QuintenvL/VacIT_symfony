<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VacatureRepository")
 */
class Vacature
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $titel;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $beschrijving;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $plaats;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Niveau")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Soort")
     * @ORM\JoinColumn(nullable=false)
     */
    private $soort;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bedrijf", inversedBy="vacatures")
     * @ORM\JoinColumn(nullable=false)
     * @MaxDepth(2)
     */
    private $bedrijf;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitel(): ?string
    {
        return $this->titel;
    }

    public function setTitel(string $titel): self
    {
        $this->titel = $titel;

        return $this;
    }

    public function getBeschrijving(): ?string
    {
        return $this->beschrijving;
    }

    public function setBeschrijving(string $beschrijving): self
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

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

    public function getNiveau(): ?niveau
    {
        return $this->niveau;
    }

    public function setNiveau(?niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getSoort(): ?soort
    {
        return $this->soort;
    }

    public function setSoort(?soort $soort): self
    {
        $this->soort = $soort;

        return $this;
    }

    public function getBedrijf(): ?bedrijf
    {
        return $this->bedrijf;
    }

    public function setBedrijf(?bedrijf $bedrijf): self
    {
        $this->bedrijf = $bedrijf;

        return $this;
    }
}
