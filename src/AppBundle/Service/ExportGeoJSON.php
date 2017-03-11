<?php
/**
 * Created by PhpStorm.
 * User: gabiudrescu
 * Date: 11.03.2017
 * Time: 14:52
 */

namespace AppBundle\Service;

use AppBundle\Entity\Institution;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Internal\Hydration\IterableResult;
use GeoJson\Feature\Feature;
use GeoJson\Geometry\Point;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Serializer;

class ExportGeoJSON
{
    public function __construct(EntityManager $em, LoggerInterface $logger, Serializer $serializer)
    {
        $this->em = $em;
        $this->logger = $logger;
        $this->serializer = $serializer;
    }

    public function generateCollection()
    {
        foreach($this->getBatchData() as $dataEntity) {
            yield $this->prepareFeature($dataEntity);
        }
    }

    private function getBatchData()
    {
        $iterator = $this->em->getRepository('AppBundle:Institution')->findWithCoordonate();
        return $this->iterate($iterator);
    }

    private function iterate(IterableResult $iterator)
    {
        foreach($iterator as $object) {
            $object = current($object);
            yield $object;
            $this->em->clear();
        }
    }

    private function prepareFeature(Institution $institution)
    {
        $array = $this->serializer->normalize($institution);

        $point = new Point($this->prepareData($institution));

        $feature = new Feature($point, $array, $institution->getCodSiiir());

        return $feature;
    }

    private function prepareData(Institution $institution)
    {
        return [round($institution->getLat(),5), round($institution->getLng(), 6)];
    }
}