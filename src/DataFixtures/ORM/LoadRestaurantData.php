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
                'name' => 'McDonalds Issy',
                'address' => 'Centre Commercial Les Trois Moulins, 4 Allée Sainte-Lucie, 92130 Issy-les-Moulineaux',
                'longitude' => 2.2492704,
                'latitude' => 48.8211241,
            ],
            [
                'name' => 'McDonalds Republique',
                'address' => '19 Place de la Republique, 75003 Paris',
                'longitude' => 2.362397,
                'latitude' => 48.867622,
            ],
            [
                'name' => 'M&S FOOD LEDRU ROLLIN',
                'address' => '19 Avenue Ledru-Rollin, 75011 Paris',
                'longitude' => 2.3766971,
                'latitude' => 48.8498437,
            ],
            [
                'name' => 'Princesse Crepe',
                'address' => '19 Rue des Ecouffes, 75004 Paris',
                'longitude' => 2.3634362,
                'latitude' => 48.853423,
            ],
            [
                'name' => 'Le Potager du Marais',
                'address' => '19 Rue Rambuteau, 75003 Paris',
                'longitude' => 2.3537418,
                'latitude' => 48.8605702,
            ],
            [
                'name' => 'Le Grenier de Notre-Dame',
                'address' => '19 Rue de la Bûcherie, 75005 Paris',
                'longitude' => 2.3451695,
                'latitude' => 48.8516369,
            ],
            [
                'name' => 'Oi Sushi',
                'address' => '19 Rue Mouffetard, 75005 Paris',
                'longitude' => 2.3487959,
                'latitude' => 48.8463419,
            ],
        ];
    }
}
