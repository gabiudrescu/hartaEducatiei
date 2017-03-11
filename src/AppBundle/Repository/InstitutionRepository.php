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
    public function countTotal()
    {
        $qb = $this->createQueryBuilder('i');

        return $qb
            ->select('count(i)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countGeocodate()
    {
        $qb = $this->createQueryBuilder('i');

        $qb->select('count(i)');

        $qb->where('i.geo_json is not null');
        $qb->andWhere('i.geo_json not like :empty');
        $qb->setParameter('empty', '');

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function countCoordonate()
    {
        $qb = $this->createQueryBuilder('i');

        $qb
            ->select('count(i)')
            ->where('i.lat is not null')
            ->andWhere('i.lng is not null');

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function countGeocodateNeprocesate()
    {
        $qb = $this->createQueryBuilder('i');

        $qb->select('count(i)');

        $qb->where('i.geo_json is not null');
        $qb->andWhere('i.geo_json not like :zero');
        $qb->andWhere('i.geo_json not like :error_message');
        $qb->andWhere('i.geo_json not like :empty');
        $qb->andWhere('i.lat is null');
        $qb->andWhere('i.lng is null');

        $qb->setParameter('zero', '%ZERO%');
        $qb->setParameter('error_message', '%error_message%');
        $qb->setParameter('empty', '');

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function findWithCoordonate()
    {
        $qb = $this->createQueryBuilder('i');

        $qb->where('i.lat is not null')
            ->andWhere('i.lng is not null');

        $qb->setMaxResults(100);

        return $qb->getQuery()->iterate();
    }

    public function findWithGeo($hasJson = false, $limit = 100, $offset = 0, $count = false)
    {
        $qb = $this->createQueryBuilder('i');

        if (!$hasJson){
            $qb->where('i.geo_json is null');
        }

        if ($hasJson){
            $qb->where('i.geo_json is not null');
            $qb->andWhere('i.geo_json not like :zero');
            $qb->andWhere('i.geo_json not like :error_message');
            $qb->andWhere('i.geo_json not like :empty');
            $qb->andWhere('i.lat is null');
            $qb->andWhere('i.lng is null');

            $qb->setParameter('zero', '%ZERO%');
            $qb->setParameter('error_message', '%error_message%');
            $qb->setParameter('empty', '');
        }

        $qb->setMaxResults($limit);
        $qb->setFirstResult($offset);

        if ($count)
        {
            $qb->select('count(i)');

            return $qb->getQuery()->getSingleScalarResult();
        }

        return $qb->getQuery()->getResult();
    }
}