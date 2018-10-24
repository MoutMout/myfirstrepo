<?php

namespace App\DataFixtures\ORM;

use App\Entity\UserRole;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadUserRoleData.
 */
class LoadUserRoleData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getUserRoles() as $data) {
            $userRole = new UserRole();
            $userRole->setName($data['name']);

            $manager->persist($userRole);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1000;
    }

    /**
     * @return array
     */
    private function getUserRoles()
    {
        return [
            [
                'name' => 'owner',
            ],
            [
                'name' => 'manager',
            ],
        ];
    }
}
