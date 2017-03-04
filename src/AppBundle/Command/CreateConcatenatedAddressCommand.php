<?php

namespace AppBundle\Command;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateConcatenatedAddressCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('create-concatenated-address')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * @var EntityManager
         */
        $em = $this->getContainer()->get('doctrine')->getManager();

        $repo = $em->getRepository('AppBundle:Institution');

        $collection = $repo->findAll();

        foreach ($collection as $key => $institution)
        {
            $output->writeln($institution->getId());

            $institution->setAdresaConcatenata(
                implode([
                    $institution->getJudet(),
                    $institution->getLocalitateSuperioara(),
                    $institution->getLocalitate(),
                    $institution->getStrada(),
                    $institution->getNumar(),
                    $institution->getCodPostal()
                ], " ")
            );

//            $institution->setGeoJson($this->geoCode($institution->getAdresaConcatenata()));

            $em->persist($institution);
            $output->writeln('Am persitat '. $institution->getId());

            if (0 === $key % 100)
            {
                $em->flush();
                $em->clear();
                $output->writeln('Am trimis la mysql');
            }
        }

        $em->flush();
    }

    private function geoCode($address)
    {
        $url = sprintf("http://maps.google.com/maps/api/geocode/json?address=%s", urlencode($address));

        $json = file_get_contents($url);

        return $json;
    }

}
