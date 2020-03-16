<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\KandidaatVacature", mappedBy="kandidaat", orphanRemoval=true)
     */
    private $kandidaatVacatures;

    public function __construct(){
        parent::__construct();
        $this->kandidaatVacatures = new ArrayCollection();
    }

    /**
     * @return Collection|KandidaatVacature[]
     */
    public function getKandidaatVacatures(): Collection
    {
        return $this->kandidaatVacatures;
    }

    public function addKandidaatVacature(KandidaatVacature $kandidaatVacature): self
    {
        if (!$this->kandidaatVacatures->contains($kandidaatVacature)) {
            $this->kandidaatVacatures[] = $kandidaatVacature;
            $kandidaatVacature->setKandidaat($this);
        }

        return $this;
    }

    public function removeKandidaatVacature(KandidaatVacature $kandidaatVacature): self
    {
        if ($this->kandidaatVacatures->contains($kandidaatVacature)) {
            $this->kandidaatVacatures->removeElement($kandidaatVacature);
            // set the owning side to null (unless already changed)
            if ($kandidaatVacature->getKandidaat() === $this) {
                $kandidaatVacature->setKandidaat(null);
            }
        }

        return $this;
    }
}
