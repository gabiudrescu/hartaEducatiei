<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GeocodeCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:geocode')
            ->setDescription('...')
            ->addArgument('offset', InputArgument::OPTIONAL, 'Argument description', 0)
            ->addArgument('limit', InputArgument::OPTIONAL, 'Option description', 100)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('geocode')->process(
            $input->getArgument('limit'),
            $input->getArgument('offset')
        );
    }
}
