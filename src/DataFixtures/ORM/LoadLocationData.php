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
            $location->setActivity($manager->getRepository('App:Activity')->findOneById($data['activityId']));
            //$location->setBisActivity($manager->getRepository('App:BisActivity')->findOneById($data['bisActivityId']));
            //$location->setTerActivity($manager->getRepository('App:TerActivity')->findOneById($data['terActivityId']));
            $location->setWifi($data['wifi']);

            if (is_array($data['users'])) {
                foreach ($data['users'] as $userId) {
                    $location->setUser($manager->getRepository('App:User')->findOneById($userId));
                }
            }

            if (is_array($data['invoices'])) {
                foreach ($data['invoices'] as $invoiceId) {
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
        return 5;
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
                'activityId' => 1,
                'bisActivityId' => 1,
                'terActivityId' => 1,
                'wifi' => true,
                'users' => [1],
                'pos' => [],
                'invoices' => [1, 2],
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
                'activityId' => 2,
                'bisActivityId' => null,
                'terActivityId' => null,
                'wifi' => true,
                'users' => [],
                'pos' => [1, 2, 3],
                'invoices' => [1],
            ],
        ];
    }
}
