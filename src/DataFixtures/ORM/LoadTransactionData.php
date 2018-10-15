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
        $twoMonthAgo = new \DateTime('first day of previous month');
        $twoMonthAgo->modify('-1 month');

        return [
            [
                'card' => 1,
                'type' => 'debit',
                'isCredit' => false,
                'description' => 'La Bonne Bavette',
                'date' => new \DateTime('-1 minute'),
                'value' => 15.50,
            ],
            [
                'card' => 1,
                'type' => 'credit',
                'isCredit' => true,
                'description' => 'Card Credit - September',
                'date' => new \DateTime('-10 minute'),
                'value' => 50,
            ],
            [
                'card' => 1,
                'type' => 'credit',
                'isCredit' => true,
                'description' => 'Card Credit - August',
                'date' => new \DateTime('-20 minute'),
                'value' => 50,
            ],
            [
                'card' => 1,
                'type' => 'debit',
                'isCredit' => false,
                'description' => 'La Ruée vers l\'Orge',
                'date' => new \DateTime('-30 minute'),
                'value' => 14.30,
            ],
            [
                'card' => 1,
                'type' => 'debit',
                'isCredit' => false,
                'description' => 'Hell\'s Kitchen',
                'date' => new \DateTime('-40 minute'),
                'value' => 16.50,
            ],
            [
                'card' => 1,
                'type' => 'debit',
                'isCredit' => false,
                'description' => 'McDonalds République',
                'date' => new \DateTime('-50 minute'),
                'value' => 12.35,
            ],
            [
                'card' => 1,
                'type' => 'debit',
                'isCredit' => false,
                'description' => 'Carrefour Restaurant',
                'date' => new DateTime('-15 day'),
                'value' => 12.39,
            ],
            [
                'card' => 1,
                'type' => 'debit',
                'isCredit' => false,
                'description' => 'Boulangerie Papatissier',
                'date' => new DateTime('first day of previous month'),
                'value' => 7.50,
            ],
            [
                'card' => 1,
                'type' => 'debit',
                'isCredit' => false,
                'description' => 'HollyBelly',
                'date' => $twoMonthAgo,
                'value' => 6.90,
            ],
            [
                'card' => 1,
                'type' => 'credit',
                'isCredit' => true,
                'description' => 'Card Credit - July',
                'date' => $twoMonthAgo,
                'value' => 50,
            ],
            [
                'card' => 1,
                'type' => 'debit',
                'isCredit' => false,
                'description' => 'KFC Republique',
                'date' => $twoMonthAgo,
                'value' => 9.90,
            ],
            [
                'card' => 1,
                'type' => 'debit',
                'isCredit' => false,
                'description' => 'Osè',
                'date' => $twoMonthAgo,
                'value' => 10.90,
            ],
            [
                'card' => 1,
                'type' => 'debit',
                'isCredit' => false,
                'description' => 'Burger and Fries',
                'date' => $twoMonthAgo,
                'value' => 9.50,
            ],
            [
                'card' => 1,
                'type' => 'debit',
                'isCredit' => false,
                'description' => 'All Star',
                'date' => $twoMonthAgo,
                'value' => 7,
            ],
            [
                'card' => 2,
                'type' => 'debit',
                'isCredit' => false,
                'description' => 'Mon Petit Pancake',
                'date' => new \DateTime('-15 minute'),
                'value' => 9.30,
            ],
            [
                'card' => 2,
                'type' => 'credit',
                'isCredit' => true,
                'description' => 'New Card Credit - September',
                'date' => new \DateTime('-25 minute'),
                'value' => 50,
            ],
        ];
    }
}
