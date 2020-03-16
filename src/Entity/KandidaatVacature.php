<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KandidaatVacatureRepository")
 */
class KandidaatVacature
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="kandidaatVacatures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $kandidaat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vacature")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vacature;

    /**
     * @ORM\Column(type="boolean")
     */
    private $uitgenodigd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKandidaat(): ?user
    {
        return $this->kandidaat;
    }

    public function setKandidaat(?user $kandidaat): self
    {
        $this->kandidaat = $kandidaat;

        return $this;
    }

    public function getVacature(): ?vacature
    {
        return $this->vacature;
    }

    public function setVacature(?vacature $vacature): self
    {
        $this->vacature = $vacature;

        return $this;
    }

    public function getUitgenodigd(): ?bool
    {
        return $this->uitgenodigd;
    }

    public function setUitgenodigd(bool $uitgenodigd): self
    {
        $this->uitgenodigd = $uitgenodigd;

        return $this;
    }
}
