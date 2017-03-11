<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExportGeoJSONCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('app:export_geo_json')
            ->setDescription('Export all schools as GEO JSON');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $collection = $this->getContainer()->get('export_geo_json')->generateCollection();

        $output->write('{"type": "FeatureCollection", "features":[');
        while ($collection->valid())
        {
            $output->write(json_encode($collection->current()));
            $collection->next();
            if ($collection->key())
            {
                $output->write(',');
            }
        }
        $output->write(']}');
    }
}
