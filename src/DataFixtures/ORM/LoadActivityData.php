<?php

namespace App\DataFixtures\ORM;

use App\Entity\Activity;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadRestaurantData.
 *
 * @author Romain Richard
 */
class LoadActivityData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getProducts() as $data) {
            $activity = new Activity();
            $activity->setName($data['name']);

            $manager->persist($activity);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1000;
    }

    /**
     * @return array
     */
    private function getProducts()
    {
        return [
            [
                'name' => 'Restaurant',
            ],
            [
                'name' => 'Grocery',
            ],
            [
                'name' => 'Pizzeria',
            ],
            [
                'name' => 'Sandwhich shop',
            ],
            [
                'name' => 'Tacos street restaurant',
            ],
        ];
    }
}
