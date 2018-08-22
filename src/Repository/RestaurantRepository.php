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
     * @param int   $radius    in kilometers
     *
     * @return mixed
     */
    public function findRestaurantByPosition(float $latitude, float $longitude, int $radius)
    {
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

        return $query->execute();
    }
}
