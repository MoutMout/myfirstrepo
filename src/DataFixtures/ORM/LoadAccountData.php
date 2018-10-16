<?php

namespace App\DataFixtures\ORM;

use App\Entity\Account;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadAccountData.
 */
class LoadAccountData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getAccounts() as $data) {
            $account = new Account();
            $account->setLogin($data['login']);
            $account->setPassword($data['password']);
            $manager->persist($account);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 0;
    }

    /**
     * @return array
     */
    private function getAccounts()
    {
        return [
            [
                'login' => 'test',
                'password' => 'AZERTY',
            ],
        ];
    }
}
