<?php

namespace App\DataFixtures\ORM;

use App\Entity\MerchantProductOffer;
use App\Entity\MerchantProductOfferType;
use App\Entity\Product;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadRestaurantData.
 *
 * @author Romain Richard
 */
class LoadMerchantProductOfferData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getProductOffers() as $data) {
            $product = $manager->getRepository(Product::class)->find($data['product_id']);

            $offer = new MerchantProductOffer();
            $offer->setName($data['name']);
            $offer->setDescription($data['description']);
            $offer->setType($data['type']);
            $offer->setBundleType($data['bundleType']);
            $offer->setPercentCost($data['percentCost']);
            $offer->setFixedFeeAmount($data['fixedFeeAmount']);
            $offer->setFixedFeeCurrency($data['fixedFeeCurrency']);
            $offer->setProduct($product);
            $offer->setCreatedAt($data['created_at']);
            $offer->setUpdatedAt($data['updated_at']);

            $manager->persist($offer);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1020;
    }

    /**
     * @return array
     */
    private function getProductOffers()
    {
        return [
            [
                'name' => 'DAILY STANDARD PASS',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::STANDARD_TYPE,
                'bundleType' => MerchantProductOfferType::DAILY_BUNDLE_TYPE,
                'percentCost' => '5.30',
                'fixedFeeAmount' => '6431',
                'fixedFeeCurrency' => 'CZK',
                'product_id' => 1,
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'DAILY ADVANCED PASS',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::ADVANCED_TYPE,
                'bundleType' => MerchantProductOfferType::DAILY_BUNDLE_TYPE,
                'percentCost' => '5.60',
                'fixedFeeAmount' => '6431',
                'fixedFeeCurrency' => 'CZK',
                'product_id' => 1,
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'DAILY PREMIUM PASS',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::PREMIUM_TYPE,
                'bundleType' => MerchantProductOfferType::DAILY_BUNDLE_TYPE,
                'percentCost' => '5.90',
                'fixedFeeAmount' => '6431',
                'fixedFeeCurrency' => 'CZK',
                'recommended' => 1,
                'product_id' => 1,
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'DAILY MAKRO PASS',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::MAKRO_TYPE,
                'bundleType' => MerchantProductOfferType::DAILY_BUNDLE_TYPE,
                'percentCost' => '5.10',
                'fixedFeeAmount' => '6431',
                'fixedFeeCurrency' => 'CZK',
                'product_id' => 1,
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'WEEKLY STANDARD PASS',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::STANDARD_TYPE,
                'bundleType' => MerchantProductOfferType::WEEKLY_BUNDLE_TYPE,
                'percentCost' => '4.30',
                'fixedFeeAmount' => '6431',
                'fixedFeeCurrency' => 'CZK',
                'product_id' => 1,
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'WEEKLY ADVANCED PASS',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::ADVANCED_TYPE,
                'bundleType' => MerchantProductOfferType::WEEKLY_BUNDLE_TYPE,
                'percentCost' => '4.60',
                'fixedFeeAmount' => '6431',
                'fixedFeeCurrency' => 'CZK',
                'product_id' => 1,
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'WEEKLY PREMIUM PASS',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::PREMIUM_TYPE,
                'bundleType' => MerchantProductOfferType::WEEKLY_BUNDLE_TYPE,
                'percentCost' => '4.90',
                'fixedFeeAmount' => '6431',
                'fixedFeeCurrency' => 'CZK',
                'recommended' => 1,
                'product_id' => 1,
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'WEEKLY MAKRO PASS',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::MAKRO_TYPE,
                'bundleType' => MerchantProductOfferType::WEEKLY_BUNDLE_TYPE,
                'percentCost' => '4.10',
                'fixedFeeAmount' => '6431',
                'fixedFeeCurrency' => 'CZK',
                'product_id' => 1,
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'MONTHLY STANDARD PASS',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::STANDARD_TYPE,
                'bundleType' => MerchantProductOfferType::MONTHLY_BUNDLE_TYPE,
                'percentCost' => '3.30',
                'fixedFeeAmount' => '6431',
                'fixedFeeCurrency' => 'CZK',
                'product_id' => 1,
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'MONTHLY ADVANCED PASS',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::ADVANCED_TYPE,
                'bundleType' => MerchantProductOfferType::MONTHLY_BUNDLE_TYPE,
                'percentCost' => '3.60',
                'fixedFeeAmount' => '6431',
                'fixedFeeCurrency' => 'CZK',
                'product_id' => 1,
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'MONTHLY PREMIUM PASS',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::PREMIUM_TYPE,
                'bundleType' => MerchantProductOfferType::MONTHLY_BUNDLE_TYPE,
                'percentCost' => '3.90',
                'fixedFeeAmount' => '6431',
                'fixedFeeCurrency' => 'CZK',
                'recommended' => 1,
                'product_id' => 1,
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
            [
                'name' => 'MONTHLY MAKRO PASS',
                'description' => 'supra dupa description',
                'type' => MerchantProductOfferType::MAKRO_TYPE,
                'bundleType' => MerchantProductOfferType::MONTHLY_BUNDLE_TYPE,
                'percentCost' => '3.10',
                'fixedFeeAmount' => '6431',
                'fixedFeeCurrency' => 'CZK',
                'product_id' => 1,
                'created_at' => 20181011,
                'updated_at' => 20181014,
            ],
        ];
    }
}
