<?php

namespace App\DataFixtures\ORM;

use App\Entity\Activity;
use App\Entity\Product;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadRestaurantData.
 *
 * @author Romain Richard
 */
class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getProducts() as $data) {
            $activity = $manager->getRepository(Activity::class)->find($data['activity_id']);

            $product = new Product();
            $product->setName($data['name']);
            $product->setDescription($data['description']);
            $product->setImageUrl($data['imageUrl']);
            $product->setActivity($activity);

            $manager->persist($product);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 1010;
    }

    /**
     * @return array
     */
    private function getProducts()
    {
        return [
            [
                'name' => 'HollyBelly',
                'description' => 'supra dupa description',
                'imageUrl' => 'https://loremflickr.com/g/320/240/book/all',
                'activity_id' => 1,
            ],
            [
                'name' => 'HollyBelly 2',
                'description' => 'supra dupa description',
                'imageUrl' => 'https://loremflickr.com/g/320/240/book/all',
                'activity_id' => 1,
            ],
            [
                'name' => 'HollyBelly 3',
                'description' => 'supra dupa description',
                'imageUrl' => 'https://loremflickr.com/g/320/240/book/all',
                'activity_id' => 2,
            ],
            [
                'name' => 'HollyBelly 4',
                'description' => 'supra dupa description',
                'imageUrl' => 'https://loremflickr.com/g/320/240/book/all',
                'activity_id' => 2,
            ],
            [
                'name' => 'HollyBelly 5',
                'description' => 'supra dupa description',
                'imageUrl' => 'https://loremflickr.com/g/320/240/book/all',
                'activity_id' => 3,
            ]
        ];
    }
}
