<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Institution;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DefaultController extends Controller
{

    /**
     * @Route("/setLangLong", name="setLangLong")
     * @param Request $request
     */
    public function setLangLongAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository('AppBundle:Institution');

        /**
         * @var Institution[] $collection
         */
        $collection = $repo->findWithGeo(true);

        foreach ($collection as $key => $item)
        {
            $json = $item->getGeoJson();

            $json = json_decode($json, true);

            if ("OK" === $json['status']){

                $item->setLat((string) $json['results'][0]['geometry']['location']['lat']);
                $item->setLng((string) $json['results'][0]['geometry']['location']['lng']);

                $em->persist($item);
            }
        }
        $em->flush();
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository('AppBundle:Institution');

        $collection = $repo->findWithGeo(false);

        return new StreamedResponse(function () use ($em, $collection){
            foreach ($collection as $key => $institution)
            {
                $getJson = function ($address){
                    $url = sprintf("http://maps.google.com/maps/api/geocode/json?address=%s", urlencode($address));
                    $json = file_get_contents($url);

                    echo $json;
                    echo "<br>";
                    echo "<br>";
                    return $json;
                };

                $institution->setGeoJson($getJson($institution->getAdresaConcatenata()));

                $em->persist($institution);

                echo $institution->getId();
                echo "<br>";
                sleep(1);

                if ($key % 10 === 0)
                {
                    $em->flush();
                    echo "<hr>";
                    echo "<br>";
                    echo "<br>";
                }
            }
        });
    }
}
