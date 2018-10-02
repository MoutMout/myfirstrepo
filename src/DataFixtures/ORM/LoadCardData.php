<?php

namespace App\DataFixtures\ORM;

use App\Entity\Card;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DateTime;

/**
 * Class LoadCardData.
 */
class LoadCardData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getCards() as $data) {
            $card = new Card();
            $card->setUserId($data['userId']);
            $card->setType($data['type']);
            $card->setNumbers($data['numbers']);
            $card->setCompany($data['company']);
            $card->setIsActive($data['isActive']);
            $card->setExpireAt($data['expireAt']);
            $card->setCountry($data['country']);
            $card->setBalance($data['balance']);
            $card->setCurrency($data['currency']);

            $manager->persist($card);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }

    /**
     * @return array
     */
    private function getCards()
    {
        return [
            [
                'userId' => '1',
                'type' => 'restaurant',
                'numbers' => '4489',
                'company' => 'Sodexo',
                'isActive' => true,
                'expireAt' => new DateTime('+6 month'),
                'country' => 'FR',
                'balance' => 45.32,
                'currency' => 'EUR',
            ],
            [
                'userId' => '2',
                'type' => 'restaurant',
                'numbers' => '0924',
                'company' => 'We Digital Garden',
                'isActive' => false,
                'expireAt' => new DateTime('+1 year'),
                'country' => 'RO',
                'balance' => 35.42,
                'currency' => 'RON',
            ],
        ];
    }
}
