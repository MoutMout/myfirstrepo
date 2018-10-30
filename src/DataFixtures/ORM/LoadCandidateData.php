<?php

namespace App\DataFixtures\ORM;

use App\Entity\Candidate;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DateTime;

/**
 * Class LoadCandidateData.
 */
class LoadCandidateData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getCandidates() as $data) {
            $candidate = new Candidate();
            $candidate->setCnp($data['cnp']);
            $candidate->setFirstName($data['firstName']);
            $candidate->setLastName($data['lastName']);
            $candidate->setIsActive($data['isActive']);

            $manager->persist($candidate);
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
    private function getCandidates()
    {
        return [
            [
                'cnp' => '1890701093243',
                'firstName' => 'Jean',
                'lastName' => 'Dupont',
                'isActive' => false,
            ],
        ];
    }
}
