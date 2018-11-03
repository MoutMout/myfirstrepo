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
                "name" => "Mobile Point-of-Sale",
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                "name" => "Tablet POS",
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                "name" => "Terminal POS",
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                "name" => "Online Point-of-Sale",
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                "name" => "Self-Service Kiosk POS",
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
        ];
    }
}
