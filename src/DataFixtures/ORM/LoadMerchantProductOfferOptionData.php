<?php

namespace App\DataFixtures\ORM;

use App\Entity\MerchantProductOffer;
use App\Entity\MerchantProductOfferOption;
use App\Entity\MerchantProductOfferType;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadRestaurantData.
 *
 * @author Romain Richard
 */
class LoadMerchantProductOfferOptionData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getProductOffers() as $data) {
            $offer = $manager->getRepository(MerchantProductOffer::class)->find($data['offer_id']);

            $option = new MerchantProductOfferOption();
            $option->setName($data['name']);
            $option->setDescription($data['description']);
            $option->setType($data['type']);
            $option->setPercentCost($data['percentCost']);
            $option->setOffer($offer);

            $manager->persist($option);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1030;
    }

    /**
     * @return array
     */
    private function getProductOffers()
    {
        return [
            [
                'name' => 'DAILY STANDARD OPTION A',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::OFFER_OPTION_A,
                'percentCost' => '7.30',
                'offer_id' => 1,
            ],
            [
                'name' => 'DAILY ADVANCED OPTION A',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::OFFER_OPTION_A,
                'percentCost' => '7.60',
                'offer_id' => 2,
            ],
            [
                'name' => 'DAILY PREMIUM OPTION A',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::OFFER_OPTION_A,
                'percentCost' => '7.90',
                'offer_id' => 3,
            ],
            [
                'name' => 'DAILY MAKRO OPTION A',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::OFFER_OPTION_A,
                'percentCost' => '7.10',
                'offer_id' => 4,
            ],
            [
                'name' => 'DAILY STANDARD OPTION B',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::OFFER_OPTION_B,
                'percentCost' => '8.30',
                'offer_id' => 1,
            ],
            [
                'name' => 'DAILY ADVANCED OPTION B',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::OFFER_OPTION_B,
                'percentCost' => '8.60',
                'offer_id' => 2,
            ],
            [
                'name' => 'DAILY PREMIUM OPTION B',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::OFFER_OPTION_B,
                'percentCost' => '8.90',
                'offer_id' => 3,
            ],
            [
                'name' => 'DAILY MAKRO OPTION B',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::OFFER_OPTION_B,
                'percentCost' => '8.10',
                'offer_id' => 4,
            ],
            [
                'name' => 'WEEKLY STANDARD OPTION A',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::OFFER_OPTION_A,
                'percentCost' => '9.30',
                'offer_id' => 5,
            ],
            [
                'name' => 'WEEKLY ADVANCED OPTION A',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::OFFER_OPTION_A,
                'percentCost' => '9.60',
                'offer_id' => 6,
            ],
            [
                'name' => 'WEEKLY PREMIUM OPTION A',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::OFFER_OPTION_A,
                'percentCost' => '9.90',
                'offer_id' => 7,
            ],
            [
                'name' => 'WEEKLY MAKRO OPTION A',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::OFFER_OPTION_A,
                'percentCost' => '9.10',
                'offer_id' => 8,
            ],
        ];
    }
}
