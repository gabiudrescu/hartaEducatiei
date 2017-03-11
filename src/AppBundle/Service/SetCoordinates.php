<?php
/**
 * Created by PhpStorm.
 * User: gabiudrescu
 * Date: 11.03.2017
 * Time: 12:52
 */

namespace AppBundle\Service;


use AppBundle\Entity\Institution;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Psr\Log\LoggerInterface;

class SetCoordinates
{

    private $em;

    private $repo;

    private $logger;

    public function __construct(EntityManager $em, LoggerInterface $logger)
    {
        $this->em = $em;
        $this->repo = $em->getRepository('AppBundle:Institution');
        $this->logger = $logger;
    }

    public function setLangLongAction($offset = 100, $limit = 100)
    {
        $em = $this->em;

        $repo = $em->getRepository('AppBundle:Institution');

        /**
         * @var ArrayCollection|Institution[] $collection
         */
        $collection = new ArrayCollection($repo->findWithGeo(true, $limit, $offset));


        if (0 === count($collection))
        {
            $this->logger->critical("There's no Institution with JSON and without coordinates");
            return;
        }

        $this->logger->info(sprintf('We have a collection of %s institutions with json and no coordinates', $collection->count()));

        foreach ($collection as $key => $item)
        {
            $json = $item->getGeoJson();


            if (isset($json['status']) && "OK" === $json['status'] && !empty($json)){
                $item->setLat((string) $json['results'][0]['geometry']['location']['lat']);
                $item->setLng((string) $json['results'][0]['geometry']['location']['lng']);

                $this->logger->info(sprintf(
                    'Successfully extracted lat %s and long %s from %s',
                    $item->getLat(),
                    $item->getLng(),
                    $item->getDenumireScurta()
                ));
            }

            if (0 === $key % 10)
            {
                $this->logger->info('persisted in db');
                $em->flush();
            }
        }
        $em->flush();

        $this->logger->info('All good!');
        return;
    }
}