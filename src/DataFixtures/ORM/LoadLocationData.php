<?php

namespace App\DataFixtures\ORM;

use App\Entity\Location;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadLocationData.
 */
class LoadLocationData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getLocations() as $data) {
            $location = new Location();
            $location->setName($data['name']);
            $location->setAddress($data['address']);
            $location->setPostalCode($data['postalCode']);
            $location->setLocality($data['locality']);
            $location->setHouseNumber($data['houseNumber']);
            $location->setWebsite($data['website']);
            $location->setEmail($data['email']);
            $location->setPhoneNumber($data['phoneNumber']);
            $location->setPhoneNumberBis($data['phoneNumberBis']);
            $location->setCreatedAt($data['created_at']);
            $location->setUpdatedAt($data['updated_at']);
            $location->setActivity($manager->getRepository('App:Activity')->findOneById($data['activity_id']));
            $location->setMerchant($manager->getRepository('App:Merchant')->findOneById($data['merchant_id']));
            $location->setWifi($data['wifi']);

            if (is_array($data['user_ids'])) {
                foreach ($data['user_ids'] as $userId) {
                    $location->setUser($manager->getRepository('App:User')->findOneById($userId));
                }
            }

            if (is_array($data['invoice_ids'])) {
                foreach ($data['invoice_ids'] as $invoiceId) {
                    $location->setInvoice($manager->getRepository('App:Invoice')->findOneById($invoiceId));
                }
            }

            $manager->persist($location);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1012;
    }

    /**
     * @return array
     */
    private function getLocations()
    {
        return [
            [
                'name' => 'My Location',
                'address' => '17 rue Bouchardon',
                'postalCode' => '75010',
                'locality' => 'London',
                'houseNumber' => '17',
                'website' => 'http://example.com',
                'email' => 'johndoe@example.com',
                'phoneNumber' => '06123123123',
                'phoneNumberBis' => '06234234234',
                'created_at' => 20181011,
                'updated_at' => 20181014,
                'activity_id' => 1,
                'bisActivity_id' => 1,
                'terActivity_id' => 1,
                'wifi' => true,
                'user_ids' => [1],
                'invoice_ids' => [1, 2],
                'merchant_id' => 1,
            ],
            [
                'name' => 'My Location 2',
                'address' => '15 rue Michel Vaillant',
                'postalCode' => '75015',
                'locality' => 'Paris',
                'houseNumber' => '15',
                'website' => 'http://example2.com',
                'email' => 'johndoe2@example.com',
                'phoneNumber' => '06123123123',
                'phoneNumberBis' => '06234234234',
                'created_at' => 20181011,
                'updated_at' => 20181014,
                'activity_id' => 2,
                'bisActivity_id' => null,
                'terActivity_id' => null,
                'wifi' => true,
                'user_ids' => [1],
                'invoice_ids' => [1],
                'merchant_id' => 1,
            ],
        ];
    }
}
