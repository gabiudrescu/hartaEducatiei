<?php

namespace AppBundle\Service;

use AppBundle\Entity\Institution;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Created by PhpStorm.
 * User: gabiudrescu
 * Date: 05.03.2017
 * Time: 12:50
 */
class GenerateAddress
{
    private $repo;

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->repo = $em->getRepository('AppBundle:Institution');
    }

    public function generateAddress(OutputInterface $output)
    {
        /**
         * @var Institution[] $collection
         */
        $collection = $this->repo->findBy(['adresa_concatenata' => null]);

        foreach ($collection as $key => $item)
        {
            $output->writeln($item->getCodSiiir());

            $item->setAdresaConcatenata(
                "Romania " .
                $item->getJudet() . " " .
                $item->getLocalitateSuperioara() . " " .
                $item->getLocalitate() . " " .
                $item->getStrada() . " " .
                $item->getNumar() . " " .
                $item->getCodPostal()
            );

            $output->writeln($item->getAdresaConcatenata());

            if ($key % 100 === 0)
            {
                $output->writeln('<bg=yellow;options=bold>Persisted</>');
                $this->em->flush();
            }
        }

        $this->em->flush();
    }
}