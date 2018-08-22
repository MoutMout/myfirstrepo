<?php

namespace App\DataFixtures\ORM;

use App\Entity\Restaurant;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadRestaurantData.
 *
 * @author Romain Richard
 */
class LoadRestaurantData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getRestaurants() as $data) {
            $restaurant = new Restaurant();
            $restaurant->setName($data['name']);
            $restaurant->setAddress($data['address']);
            $restaurant->setLatitude($data['latitude']);
            $restaurant->setLongitude($data['longitude']);

            $manager->persist($restaurant);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 5678;
    }

    /**
     * @return array
     */
    private function getRestaurants()
    {
        return [
            [
                'name' => 'HollyBelly',
                'address' => '5 Rue Lucien Sampaix, 75010 Paris',
                'longitude' => 2.358543,
                'latitude' => 48.8710039,
            ],
            [
                'name' => 'Boulangerie Papatissier',
                'address' => '10 Place Jacques Bonsergent, 75010 Paris',
                'longitude' => 2.3596486,
                'latitude' => 48.870955,
            ],
            [
                'name' => 'McDonalds',
                'address' => 'Centre Commercial Les Trois Moulins, 4 Allée Sainte-Lucie, 92130 Issy-les-Moulineaux',
                'longitude' => 2.2492704,
                'latitude' => 48.8211241,
            ],
        ];
    }
}
