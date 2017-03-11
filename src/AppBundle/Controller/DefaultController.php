<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Institution;
use Doctrine\Common\Collections\ArrayCollection;
use GeoJson\Feature\Feature;
use GeoJson\Feature\FeatureCollection;
use GuzzleHttp\Pool;
use Psr\Http\Message\ResponseInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $total = $this->getDoctrine()->getRepository('AppBundle:Institution')->countTotal();
        $geocodate = $this->getDoctrine()->getRepository('AppBundle:Institution')->countGeocodate();
        $coordonate = $this->getDoctrine()->getRepository('AppBundle:Institution')->countCoordonate();
        $neprocesate = $this->getDoctrine()->getRepository('AppBundle:Institution')->countGeocodateNeprocesate();
        $faraGeoCodare = $this->getDoctrine()->getRepository('AppBundle:Institution')->findWithGeo(false, 1000000, 0, true);

        return $this->render('default/index.html.twig', [
            'total' => $total,
            'geocodate' => $geocodate,
            'coordonate' => $coordonate,
            'neprocesate' => $neprocesate,
            'faraGeo' => $faraGeoCodare
        ]);
    }

    /**
     * @Route("/geojson/{id}", name="geojson")
     * @param Institution $institution
     */
    public function geoJSON(Institution $institution)
    {
        $array = $this->get('serializer')->normalize($institution);
        $point = new \GeoJson\Geometry\Point([round($institution->getLat(),5), round($institution->getLng(),5)]);

        $feature = new Feature($point, $array, $institution->getCodSiiir());

        $collection = new FeatureCollection([$feature, $feature]);

        return new JsonResponse($collection);
    }
}
