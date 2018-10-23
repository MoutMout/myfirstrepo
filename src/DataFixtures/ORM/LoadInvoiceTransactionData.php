<?php

namespace App\DataFixtures\ORM;

use App\Entity\InvoiceTransaction;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadTransactionData.
 */
class LoadInvoiceTransactionData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getInvoiceTransactionData() as $data) {
            $transaction = new InvoiceTransaction();
            $transaction->setDate($data['date']);
            $transaction->setAmount($data['amount']);
            $transaction->setCurrency($data['currency']);
            $transaction->setInvoice($manager->getRepository('App:Invoice')->findOneById($data['invoice']));
            $transaction->setProduct($manager->getRepository('App:Product')->findOneById($data['product']));
            $manager->persist($transaction);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1011;
    }

    /**
     * @return array
     */
    private function getInvoiceTransactionData()
    {
        return [
            [
                'date' => new \DateTime('+15 day'),
                'amount' => 200,
                'currency' => 'EUR',
                'invoice' => 1,
                'product' => 1,
            ],
        ];
    }
}
