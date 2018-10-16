<?php

namespace App\DataFixtures\ORM;

use App\Entity\Device;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadDeviceData.
 */
class LoadDeviceData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getLocations() as $data) {
            $device = new Device();
            $device->setName($data['name']);
            $device->setCreatedAt($data['created_at']);
            $device->setUpdatedAt($data['updated_at']);

            $manager->persist($device);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1002;
    }

    /**
     * @return array
     */
    private function getLocations()
    {
        return [
            [
                'name' => 'DEVICE 1',
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'DEVICE 2',
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
        ];
    }
}
