<?php
/**
 * Created by PhpStorm.
 * User: gabiudrescu
 * Date: 04.03.2017
 * Time: 15:40
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class InstitutionRepository extends EntityRepository
{
    public function findWithGeo($hasJson = false)
    {
        $qb = $this->createQueryBuilder('i');

        if (!$hasJson){
            $qb->where('i.geo_json is null');
        }

        if ($hasJson){
            $qb->where('i.geo_json is not null');
            $qb->andWhere('i.lat is null');
            $qb->andWhere('i.lng is null');
        }

        return $qb->getQuery()->getResult();
    }
}