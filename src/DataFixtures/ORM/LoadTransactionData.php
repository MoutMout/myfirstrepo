<?php

namespace App\DataFixtures\ORM;

use App\Entity\Transaction;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use \DateTime;

/**
 * Class LoadTransactionData.
 */
class LoadTransactionData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getTransactions() as $data) {
            $transaction = new Transaction();
            $transaction->setCard($manager->getRepository('App:Card')->findOneById($data['card']));
            $transaction->setType($data['type']);
            $transaction->setIsCredit($data['isCredit']);
            $transaction->setDescription($data['description']);
            $transaction->setDate($data['date']);
            $transaction->setValue($data['value']);

            $manager->persist($transaction);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 3;
    }

    /**
     * @return array
     */
    private function getTransactions()
    {
        return [
            [
                'card' => '1',
                'type' => 'debit',
                'isCredit' => 'false',
                'description' => 'La Bonne Bavette',
                'date' => new DateTime('2018-09-19 14:35:39'),
                'value' => 15.50,
            ],
            [
                'card' => '1',
                'type' => 'credit',
                'isCredit' => 'true',
                'description' => 'Card Credit - September',
                'date' => new DateTime('2018-09-01 14:00:00'),
                'value' => 50,
            ],
            [
                'card' => '1',
                'type' => 'credit',
                'isCredit' => 'true',
                'description' => 'Card Credit - August',
                'date' => new DateTime('2018-08-01 14:00:00'),
                'value' => 50,
            ],
            [
                'card' => '1',
                'type' => 'debit',
                'isCredit' => 'false',
                'description' => 'La Ruée vers l\'Orge',
                'date' => new DateTime('2018-09-14 21:20:12'),
                'value' => 14.30,
            ],
            [
                'card' => '1',
                'type' => 'debit',
                'isCredit' => 'false',
                'description' => 'Hell\'s Kitchen',
                'date' => new DateTime('2018-08-12 13:12:10'),
                'value' => 16.50,
            ],
            [
                'card' => '1',
                'type' => 'debit',
                'isCredit' => 'false',
                'description' => 'McDonalds République',
                'date' => new DateTime('2018-09-02 12:30:39'),
                'value' => 12.35,
            ],
            [
                'card' => '4',
                'type' => 'debit',
                'isCredit' => 'false',
                'description' => 'Mon Petit Pancake',
                'date' => new DateTime('2018-09-11 12:32:12'),
                'value' => 9.30,
            ],
            [
                'card' => '4',
                'type' => 'credit',
                'isCredit' => 'true',
                'description' => 'New Card Credit - September',
                'date' => new DateTime('2018-09-01 14:00:00'),
                'value' => 50,
            ],
        ];
    }
}
