<?php
namespace App\Controller\Rest;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;

use App\Entity\Vacature;
use App\Entity\KandidaatVacature;

use Psr\Log\LoggerInterface;

class ApiController extends AbstractFOSRestController {

    /**
     * @Rest\Get("/vacatures", name="vacatures")
     */
    public function getAllVacatures(Request $request){

        $repo = $this->getDoctrine()->getRepository(Vacature::class);
        $vacatures = $repo->getAllVacatures();
        return (View::create($vacatures, Response::HTTP_OK));
    }


    /**
     * @Rest\Post("/vacature/soliciteer", name="soliciteer")
     * @param  int    $userId     [description]
     * @param  int    $vacatureId [description]
     * @return [type]             [description]
     */
    public function soliciteer(Request $request){
        $params["userId"] = $request->get("userId");
        $params["vacatureId"] = $request->get("vacatureId");

        $repo = $this->getDoctrine()->getRepository(KandidaatVacature::class);
        $data = $repo->saveSolicitatie($params);

        return ( View::create($data, Response::HTTP_OK));

    }
}
