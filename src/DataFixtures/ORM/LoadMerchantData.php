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
            $merchant->setCourtFileNb($data['court_file_nb']);
            $merchant->setIcoNumber($data['ico_nb']);

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
                'court_file_nb' => "B5678IJNBV",
                'ico_nb' => "0009",
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'organisation_id' => '2',
                'companyId' => '74jsdo384j',
                'address' => '51 rue Spooktober',
                'postalCode' => '60200',
                'city' => 'Caen',
                'VATnumber' => '0987654321',
                'court_file_nb' => "7890PLKJHGFDX",
                'ico_nb' => "003",
                'created_at' => 20181012,
                'updated_at' => 20181012,
                'locations' => [3],
                'users' => [1],
            ],
        ];
    }
}
