<?php

namespace App\DataFixtures\ORM;

use App\Entity\Organisation;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadOrganisationData.
 */
class LoadOrganisationData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getOrganisations() as $data) {
            $organisation = new Organisation();
            $organisation->setName($data['name']);
            $organisation->setCreatedAt($data['created_at']);
            $organisation->setUpdatedAt($data['updated_at']);
            $manager->persist($organisation);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 999;
    }

    /**
     * @return array
     */
    private function getOrganisations()
    {
        return [
            [
                'name' => 'Organisation 1',
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'Orga 2',
                'created_at' => 20180909,
                'updated_at' => 20181122,
            ],
        ];
    }
}
