<?php

namespace App\DataFixtures\ORM;

use App\Entity\Merchant;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadMerchantData.
 */
class LoadMerchantData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getMerchants() as $data) {
            $merchant = new Merchant();
            $merchant->setOrganisation($manager->getRepository('App:Organisation')->findOneById($data['organisation_id']));
            $merchant->setCreatedAt($data['created_at']);
            $merchant->setUpdatedAt($data['updated_at']);
            $merchant->setCompanyId($data['companyId']);
            $merchant->setAddress($data['address']);
            $merchant->setPostalCode($data['postalCode']);
            $merchant->setCity($data['city']);
            $merchant->setVATnumber($data['VATnumber']);

            if (is_array($data['locations'])) {
                foreach ($data['locations'] as $locationId) {
                    $merchant->setLocation($manager->getRepository('App:Location')->findOneById($locationId));
                }
            }

            if (is_array($data['users'])) {
                foreach ($data['users'] as $userId) {
                    $merchant->setUser($manager->getRepository('App:User')->findOneById($userId));
                }
            }
            $manager->persist($merchant);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1010;
    }

    /**
     * @return array
     */
    private function getMerchants()
    {
        return [
            [
                'organisation_id' => '1',
                'companyId' => '1fvgbh3456',
                'address' => '17 rue bouchardon',
                'postalCode' => '94010',
                'city' => 'Paris',
                'VATnumber' => '1234567890',
                'created_at' => 20181011,
                'updated_at' => 20181014,
                'locations' => [1, 2],
                'users' => [1],
            ],
        ];
    }
}
