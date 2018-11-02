<?php

namespace App\DataFixtures\ORM;

use App\Entity\Language;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadLanguageData.
 */
class LoadLanguageData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getLocations() as $data) {
            $ob = new Language();
            $ob->setName($data['name']);
            $ob->setIso($data['iso']);
            $ob->setCreatedAt($data['created_at']);
            $ob->setUpdatedAt($data['updated_at']);

            $manager->persist($ob);
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
                'name' => 'English',
                'iso' => 'GB',
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'French',
                'iso' => 'FR',
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
        ];
    }
}
