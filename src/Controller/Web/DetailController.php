<?php

namespace App\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use App\Entity\Vacature;
use App\Entity\KandidaatVacature;

class DetailController extends AbstractController
{
    /**
     * @Route("/vacature/{id}", name="detail")
     * @Template()
     */
    public function vacature($id) {
        $vacatureRepo = $this->getDoctrine()->getRepository(Vacature::class);
        $kandidaatVacRepo = $this->getDoctrine()->getRepository(KandidaatVacature::class);

        $vacature = $vacatureRepo->getSingleVacature($id);
        if ($vacature == null) {
            return $this->render('web/detail/notFound.html.twig',[]);
        }
        $user = $this->getUser();
        $kandidaatVacature = null;
        if ($user !== null) {
            $kandidaatVacature = $kandidaatVacRepo->getVacaturesByIdAndUser($id, $user->getId());
        }

        return ['vacature' => $vacature, 'kanVac' => $kandidaatVacature];
    }
}
