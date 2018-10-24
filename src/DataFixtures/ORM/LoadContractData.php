<?php

namespace App\DataFixtures\ORM;

use App\Entity\Contract;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadContractData.
 */
class LoadContractData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getContracts() as $data) {
            $contract = new Contract();
            $contract->setMerchant($manager->getRepository('App:Merchant')->findOneById($data['merchant_id']));
            $contract->setFile($data['file']);
            $contract->setThermsConditionsFile($data['therms_conditions_file']);
            $contract->setPowerAttorneyFile($data['power_attorney_file']);
            $contract->setCreatedAt($data['created_at']);
            $contract->setUpdatedAt($data['updated_at']);

            $manager->persist($contract);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1040;
    }

    /**
     * @return array
     */
    private function getContracts()
    {
        return [
            [
                'merchant_id' => 1,
                'file' => 'http://file.fr/test.pdf',
                'therms_conditions_file' => 'lien1',
                'power_attorney_file' => 'lien2',
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'merchant_id' => 2,
                'file' => 'http://file.fr/test2.pdf',
                'therms_conditions_file' => 'lien3',
                'power_attorney_file' => 'lien3',
                'created_at' => 20181012,
                'updated_at' => 20181012,
            ],
        ];
    }
}
