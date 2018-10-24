<?php

namespace App\DataFixtures\ORM;

use App\Entity\Invoice;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadInvoiceData.
 */
class LoadInvoiceData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getInvoices() as $data) {
            $invoice = new Invoice();
            $invoice->setIssueDate($data['issueDate']);
            $invoice->setDueDate($data['dueDate']);
            $invoice->setAmount($data['amount']);
            $invoice->setNbVoucherPurchases($data['nbVoucherPurchases']);
            $invoice->setNbCardPurchases($data['nbCardPurchases']);
            $invoice->setNbShipments($data['nbShipments']);
            $invoice->setCurrency($data['currency']);

            $manager->persist($invoice);
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
    private function getInvoices()
    {
        return [
            [
                'issueDate' => new \DateTime('-5 day'),
                'dueDate' => new \DateTime('+5 day'),
                'amount' => 200,
                'nbVoucherPurchases' => 25,
                'nbCardPurchases' => 32,
                'nbShipments' => 42,
                'currency' => 'EUR',
            ],
            [
                'issueDate' => new \DateTime('-15 day'),
                'dueDate' => new \DateTime('+15 day'),
                'amount' => 250,
                'nbVoucherPurchases' => 15,
                'nbCardPurchases' => 36,
                'nbShipments' => 44,
                'currency' => 'EUR',
            ],
        ];
    }
}
