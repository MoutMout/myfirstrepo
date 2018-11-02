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
            $activity->setType($data['type']);
            if (isset($data['parent_activity_id'])) {
                $activity->setParentActivity($manager->getRepository('App:Activity')->findOneById($data['parent_activity_id']));
            }

            $manager->persist($activity);
            $manager->flush();
        }
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
                'type' => 'main',
            ],
            [
                'name' => 'Grocery',
                'type' => 'main',
            ],
            [
                'name' => 'Pizzeria',
                'type' => 'main',
            ],
            [
                'name' => 'Sandwhich shop',
                'type' => 'main',
            ],
            [
                'name' => 'Tacos street restaurant',
                'type' => 'main',
            ],
            [
                'name' => 'fruit de mere',
                'type' => 'sub',
                'parent_activity_id' => 1,
            ],
            [
                'name' => 'homar',
                'type' => 'sub',
                'parent_activity_id' => 6,
            ],
        ];
    }
}
