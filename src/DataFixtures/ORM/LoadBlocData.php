<?php

/*
 * This file is part of the promote-api package.
 *
 * (c) Bigz
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace App\DataFixtures\ORM;

use App\Entity\Bloc;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadBlocData
 * @author Romain Richard
 */
class LoadBlocData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @inheritdoc
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getBlocs() as $data) {
            $label = new Bloc();
            $label->setBody($data['body']);

            $manager->persist($label);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 42;
    }

    /**
     * @return array
     */
    private function getBlocs()
    {
        return [
            [
                'body' => 'test'
            ],
            [
                'body' => '<b>coucou</b>'
            ]
        ];
    }
}
