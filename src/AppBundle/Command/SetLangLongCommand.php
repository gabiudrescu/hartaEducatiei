<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetLangLongCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:setcoordinates')
            ->setDescription('Extract Coordinates from the Google Maps JSON')
            ->addArgument('offset', InputArgument::OPTIONAL, 'offset', 100)
            ->addArgument('limit', InputArgument::OPTIONAL, 'how many items', 100);
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->get('set_coordinates')->setLangLongAction(
            $input->getArgument('offset'),
            $input->getArgument('limit')
        );
    }
}
