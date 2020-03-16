<?php

namespace App\Controller\Web;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use App\Entity\Vacature;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Vacature::class);
        $recent = $repo->getRecentVacatures();
        return ['controller_name' => 'HomeController', 'recents'=> $recent];
    }
}
