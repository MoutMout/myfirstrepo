<?php

namespace App\DataFixtures\ORM;

use App\Entity\Bank;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadDeviceData.
 */
class LoadBankData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getLocations() as $data) {
            $bank = new Bank();
            $bank->setName($data['name']);
            $bank->setCreatedAt($data['created_at']);
            $bank->setUpdatedAt($data['updated_at']);

            $manager->persist($bank);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1001;
    }

    /**
     * @return array
     */
    private function getLocations()
    {
        return [
            [
                'name' => 'BNP',
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'CREDIT AGRICOLE',
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
        ];
    }
}
