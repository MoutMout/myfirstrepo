<?php

namespace App\DataFixtures\ORM;

use App\Entity\ContractDetails;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadContractData.
 */
class LoadContractDetailsData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as $data) {
            $contractDetails = new ContractDetails();
            $contractDetails->setContract($manager->getRepository('App:Contract')->findOneById($data['contract_id']));
            $contractDetails->setProduct($manager->getRepository('App:Product')->findOneById($data['product_id']));
            $contractDetails->setOffer($manager->getRepository('App:MerchantProductOffer')->findOneById($data['offer_id']));
            $contractDetails->setOption($manager->getRepository('App:MerchantProductOfferOption')->findOneById($data['option_id']));
            $contractDetails->setCreatedAt($data['created_at']);
            $contractDetails->setUpdatedAt($data['updated_at']);
            $contractDetails->setDeletedAt($data['deleted_at']);
            $manager->persist($contractDetails);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1050;
    }

    /**
     * @return array
     */
    private function getData()
    {
        return [
            [
                'contract_id' => 1,
                'product_id' => 1,
                'offer_id' => 1,
                'option_id' => 1,
                'created_at' => 20180320,
                'updated_at' => 20180517,
                'deleted_at' => 0,
            ],
            [
                'contract_id' => 1,
                'product_id' => 2,
                'offer_id' => 2,
                'option_id' => 1,
                'created_at' => 20180321,
                'updated_at' => 20180509,
                'deleted_at' => 0,
            ],
        ];
    }
}
