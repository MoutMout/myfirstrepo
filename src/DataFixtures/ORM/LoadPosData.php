<?php

namespace App\DataFixtures\ORM;

use App\Entity\Pos;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadTransactionData.
 */
class LoadPosData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getPosDatas() as $data) {
            $pos = new Pos();
            $pos->setTerminalId($data['terminal_id']);
            $pos->setCreatedAt($data['created_at']);
            $pos->setUpdatedAt($data['updated_at']);
            $pos->setBank($manager->getRepository('App:Bank')->findOneById($data['bank_id']));
            $pos->setDevice($manager->getRepository('App:Device')->findOneById($data['device_id']));
            $pos->setLocation($manager->getRepository('App:Location')->findOneById($data['location_id']));

            $manager->persist($pos);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1006;
    }

    /**
     * @return array
     */
    private function getPosDatas()
    {
        return [
            [
                'terminal_id' => '7Y9C79CE',
                'created_at' => 20181011,
                'updated_at' => 20181014,
                'bank_id' => 1,
                'device_id' => 1,
                'location_id' => 2,
            ],
            [
                'terminal_id' => 'ST8XT8SC',
                'created_at' => 20181011,
                'updated_at' => 20181014,
                'bank_id' => 1,
                'device_id' => 2,
                'location_id' => 2,
            ],
            [
                'terminal_id' => '5Z76D576D',
                'created_at' => 20181011,
                'updated_at' => 20181014,
                'bank_id' => 2,
                'device_id' => 1,
                'location_id' => 2,
            ],
        ];
    }
}
