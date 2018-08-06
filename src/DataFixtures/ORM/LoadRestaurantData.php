<?php

/*
 * This file is part of the promote-api package.
 *
 * (c) Bigz
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace App\DataFixtures\ORM;

use App\Entity\Restaurant;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadRestaurantData
 * @author Romain Richard
 */
class LoadRestaurantData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @inheritdoc
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
                'name' => 'test',
                'address' => 'test',
                'longitude' => 45.8,
                'latitude' => 64.9,
            ],
            [
                'name' => 'test2',
                'address' => 'test2',
                'longitude' => 49.8,
                'latitude' => 78.9,
            ]
        ];
    }
}
