<?php

namespace App\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use App\Entity\KandidaatVacature;

class MijnVacaturesController extends AbstractController
{
    /**
     * @Route("/vacatures/mijn", name="mijn-vac")
     * @Template
     */
    public function index()
    {

        $repo = $this->getDoctrine()->getRepository(KandidaatVacature::class);
        $user = $this->getUser();
        $vacatures = $repo->getMijnVacatures($user->getId());

        return ['vacatures' => $vacatures];
    }
}
