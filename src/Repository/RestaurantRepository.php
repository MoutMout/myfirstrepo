<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use App\Entity\Restaurant;

/**
 * Class RestaurantRepository.
 *
 * @author Romain Richard
 */
class RestaurantRepository extends ServiceEntityRepository
{
    /**
     * @param float $latitude
     * @param float $longitude
     * @param int   $radius    in kilometers DEPRECATED
     *
     * @return mixed
     */
    public function findRestaurantByPosition(float $latitude, float $longitude, int $radius)
    {
        // first, get all restaurants within radius
        $entityManager = $this->getEntityManager();
        $rsm = new ResultSetMappingBuilder($this->getEntityManager());
        $rsm->addRootEntityFromClassMetadata(Restaurant::class, 'restaurant');
        // uses postgis extension to calculate the distance between 2 points on earth
        $sql = <<<SQL
            SELECT *
            FROM restaurant
            WHERE ST_DistanceSphere(
              st_point(restaurant.longitude, restaurant.latitude), 
              st_point(:longitude, :latitude)
            ) <= :radius
SQL;
        $query = $entityManager->createNativeQuery($sql, $rsm)
            ->setParameter(':latitude', $latitude)
            ->setParameter(':longitude', $longitude)
            ->setParameter(':radius', $radius);

        $result = $query->execute();

        if (0 === count($result)) {
            $sql = <<<SQL
            SELECT *, ST_DistanceSphere(
              st_point(restaurant.longitude, restaurant.latitude), 
              st_point(:longitude, :latitude)
            ) as distance
            FROM restaurant
            ORDER BY distance ASC
            LIMIT 5
SQL;
            $query = $entityManager->createNativeQuery($sql, $rsm)
                ->setParameter(':latitude', $latitude)
                ->setParameter(':longitude', $longitude);

            return $query->execute();
        }

        return $result;
    }

    /**
     * @param float  $latitude
     * @param float  $longitude
     * @param string $search
     *
     * @return mixed
     */
    public function findClosestRestaurants(float $latitude, float $longitude, string $search)
    {
        $entityManager = $this->getEntityManager();
        $rsm = new ResultSetMappingBuilder($this->getEntityManager());
        $rsm->addRootEntityFromClassMetadata(Restaurant::class, 'restaurant');
        // uses postgis extension to calculate the distance between 2 points on earth
        $sql = <<<SQL
            SELECT *, ST_DistanceSphere(
              st_point(restaurant.longitude, restaurant.latitude), 
              st_point(:longitude, :latitude)
            ) as distance
            FROM restaurant
            WHERE lower(restaurant.name) LIKE :search
            OR lower(restaurant.address) LIKE :search
            ORDER BY distance
            LIMIT 5
SQL;
        $query = $entityManager->createNativeQuery($sql, $rsm)
            ->setParameter(':latitude', $latitude)
            ->setParameter(':longitude', $longitude)
            ->setParameter(':search', '%'.strtolower($search).'%');

        return $query->execute();
    }
}
