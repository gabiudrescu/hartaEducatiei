<?php
/**
 * Created by PhpStorm.
 * User: gabiudrescu
 * Date: 05.03.2017
 * Time: 13:18
 */

namespace AppBundle\Service;


use AppBundle\Entity\Institution;
use Doctrine\ORM\EntityManager;
use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;

class GeoCode
{
    private $client;

    private $em;

    private $repo;

    private $log;

    private $key;

    public function __construct(Client $client, EntityManager $em, LoggerInterface $log, $key = '')
    {
        $this->client = $client;
        $this->em = $em;
        $this->repo = $em->getRepository('AppBundle:Institution');
        $this->log = $log;
        $this->key = $key;
    }

    public function process($limit = 100, $offset = 0)
    {
        /**
         * @var Institution[] $collection
         */
        $collection = $this->repo->findWithGeo(false, $limit, $offset);

        $i = count($collection);

        $valid = 0;
        $invalid = 0;

        foreach ($collection as $key => $item)
        {
            $this->log->info(sprintf('Working on %s', $key));


            if (is_null($item->getAdresaConcatenata()))
            {
                continue;
            }

            $json = $this->client->get('json', ['query' => [
                'address' => $item->getAdresaConcatenata(),
                'key' => $this->key
            ]])->getBody()->getContents();

            if(isset(json_decode($json, true)['error_message'])) {
                $this->log->critical('we reached the limit', json_decode($json, true));
                return;
            }

            if(isset(json_decode($json, true)['results']))
            {
                $status = json_decode($json, true)['status'];

                if ("ZERO_RESULTS" === $status)
                {
                    $invalid++;
                    $this->log->info(sprintf('OK results so far: %s', $valid));
                    $this->log->info(sprintf('No results so far: %s', $invalid));
                }

                if ("OVER_QUERY_LIMIT" === $status)
                {

                }

                if ("OK" === $status)
                {
                    $valid++;
                    $this->log->info(sprintf('OK results so far: %s', $valid));
                    $this->log->info(sprintf('No results so far: %s', $invalid));
                }
            }

            $item->setGeoJson(json_decode($json));

            $i--;

            $this->log->info(sprintf('Still having to geocode %s adddresses', $i));

            if ($key % 10 === 0)
            {
                $this->em->flush();
                $this->log->warning('persisted');
            }

        }

        $this->em->flush();
    }
}