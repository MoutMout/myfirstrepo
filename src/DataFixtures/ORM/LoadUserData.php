<?php

namespace App\DataFixtures\ORM;

use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadUserData.
 */
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getUserDatas() as $data) {
            $user = new User();
            $user->setFirstname($data['firstName']);
            $user->setLastname($data['lastName']);
            $user->setEmail($data['email']);
            $user->setPhone($data['phone']);
            $user->setAccount($manager->getRepository('App:Account')->findOneById($data['account_id']));
            $user->setRole($manager->getRepository('App:UserRole')->findOneById($data['role_id']));
            $user->setCreatedAt($data['created_at']);
            $user->setUpdatedAt($data['updated_at']);

            $manager->persist($user);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * @return array
     */
    private function getUserDatas()
    {
        return [
            [
                'firstName' => 'Arthur',
                'lastName' => 'Liege',
                'phone' => '+33 7549394585',
                'email' => 'pizza@pizza.pizza',
                'account_id' => 1,
                'role_id' => 1,
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
        ];
    }
}
