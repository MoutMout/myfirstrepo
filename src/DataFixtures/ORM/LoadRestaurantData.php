<?php

namespace App\DataFixtures\ORM;

use App\Entity\Restaurant;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadRestaurantData.
 *
 * @author Romain Richard
 */
class LoadRestaurantData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getRestaurants() as $data) {
            $restaurant = new Restaurant();
            $restaurant->setName($data['name']);
            $restaurant->setAddress($data['address']);
            $restaurant->setLongitude($data['longitude']);
            $restaurant->setLatitude($data['latitude']);

            $manager->persist($restaurant);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 5678;
    }

    /**
     * @return array
     */
    private function getRestaurants()
    {
        return [
            [
                'name' => 'HollyBelly',
                'address' => '5 Rue Lucien Sampaix, 75010 Paris',
                'longitude' => 2.358543,
                'latitude' => 48.8710039,
            ],
            [
                'name' => 'Boulangerie Papatissier',
                'address' => '10 Place Jacques Bonsergent, 75010 Paris',
                'longitude' => 2.3596486,
                'latitude' => 48.870955,
            ],
            [
                'name' => 'McDonalds Issy',
                'address' => 'Centre Commercial Les Trois Moulins, 4 Allée Sainte-Lucie, 92130 Issy-les-Moulineaux',
                'longitude' => 2.2492704,
                'latitude' => 48.8211241,
            ],
            [
                'name' => 'McDonalds Republique',
                'address' => '19 Place de la Republique, 75003 Paris',
                'longitude' => 2.362397,
                'latitude' => 48.867622,
            ],
            [
                'name' => 'BOULANGERIE',
                'address' => '19 RUE BOUCHARDON , 75010 PARIS',
                'longitude' => 2.3578639,
                'latitude' => 48.8708305,
            ],
            [
                'name' => 'FRANPRIX 5278',
                'address' => '16 RUE BOUCHARDON , 75010 PARIS',
                'longitude' => 2.3576760,
                'latitude' => 48.8704948,
            ],
            [
                'name' => 'LA PENDULE OCCITANE',
                'address' => '27 RUE BOUCHARDON , 75010 PARIS',
                'longitude' => 2.3579459,
                'latitude' => 48.8711433,
            ],
            [
                'name' => 'LE REVEIL DU XEME',
                'address' => '35 RUE DU CHATEAU D EAU 29 RUE BOUCHARDON, 75010 PARIS',
                'longitude' => 2.3580179,
                'latitude' => 48.8712272,
            ],
            [
                'name' => 'LA CASBA MAROCAINE',
                'address' => '31 RUE DU CHATEAU D EAU MARCHE SAINT MARTIN, 75010 PARIS',
                'longitude' => 2.3578836,
                'latitude' => 48.8706283,
            ],
            [
                'name' => 'LA PETITE LOUISE',
                'address' => '54 RUE DU CHATEAU D EAU ANGLE RUE DU FAUBOURG SAINT MARTIN, 75010 PARIS',
                'longitude' => 2.3570299,
                'latitude' => 48.8719367,
            ],
            [
                'name' => 'CHICHE',
                'address' => '29 BIS RUE DU CHATEAU D EAU , 75010 PARIS',
                'longitude' => 2.3586773,
                'latitude' => 48.8708839,
            ],
            [
                'name' => 'MIAM',
                'address' => '9 CITE RIVERIN , 75010 PARIS',
                'longitude' => 2.3584539,
                'latitude' => 48.8705940,
            ],
            [
                'name' => 'POINT BAR',
                'address' => '2 PASSAGE DU MARCHE SAINT MARTIN , 75010 PARIS',
                'longitude' => 2.3578970,
                'latitude' => 48.8708686,
            ],
            [
                'name' => 'AYKOO SUSHI',
                'address' => '1 RUE DU TINTORET , 92600 ASNIERES SUR SEINE',
                'longitude' => 2.2680599,
                'latitude' => 48.9061012,
            ],
            [
                'name' => 'LA PLACE',
                'address' => '58 RUE DE LA SABLIERE , 75014 PARIS',
                'longitude' => 2.3207099,
                'latitude' => 48.8323783,
            ],
            [
                'name' => 'BOULANGERIE DE LA GARE',
                'address' => '68 RUE DE LA SABLIERE , 92600 ASNIERES SUR SEINE',
                'longitude' => 2.2681858,
                'latitude' => 48.9061660,
            ],
            [
                'name' => 'DALAT VIETNAM',
                'address' => '31 RUE DE LA SABLIERE , 75014 PARIS',
                'longitude' => 2.3219854,
                'latitude' => 48.8320045,
            ],
            [
                'name' => 'JARDIN DE SSHANGAI',
                'address' => '4 AVENUE LIBERTE , 92400 COURBEVOIE',
                'longitude' => 2.2683649,
                'latitude' => 48.9039344,
            ],
            [
                'name' => 'A L ITALIA',
                'address' => '12 AVENUE DE LA LIBERTE , 92400 COURBEVOIE',
                'longitude' => 2.2686600,
                'latitude' => 48.9047508,
            ],
            [
                'name' => 'BOULANGERIE PATISSERIE',
                'address' => '11 AVENUE DE LA LIBERTE , 92400 COURBEVOIE',
                'longitude' => 2.2685606,
                'latitude' => 48.9046325,
            ],
            [
                'name' => 'CAFE AU BON COIN',
                'address' => '49 AVENUE PASTEUR , 92400 COURBEVOIE',
                'longitude' => 2.2691340,
                'latitude' => 48.9044303,
            ],
            [
                'name' => 'TRAITEUR ZONG',
                'address' => '51 AVENUE PASTEUR , 92400 COURBEVOIE',
                'longitude' => 2.2690899,
                'latitude' => 48.9046783,
            ],
            [
                'name' => 'PETIT CASINO C4448',
                'address' => '43 AVENUE PASTEUR , 92400 COURBEVOIE',
                'longitude' => 2.2694947,
                'latitude' => 48.9038200,
            ],
            [
                'name' => 'PATAPAIN 692',
                'address' => '65 AVENUE DE VENDOME , 41000 BLOIS',
                'longitude' => 1.3217258,
                'latitude' => 47.5992469,
            ],
            [
                'name' => 'CHARCUTERIE PARISIENNE',
                'address' => '11 CARROIR DES BARBIERS , 41130 SELLES SUR CHER',
                'longitude' => 1.5551851,
                'latitude' => 47.2755546,
            ],
            [
                'name' => 'REST CAPRICORNES',
                'address' => '8 BOULEVARD TREMAULT , 41100 VENDOME',
                'longitude' => 1.0680849,
                'latitude' => 47.8014144,
            ],
            [
                'name' => 'REST DE LA GARE',
                'address' => '19 AVENUE REPUBLIQUE , 41150 ONZAIN',
                'longitude' => 1.1845010,
                'latitude' => 47.4918251,
            ],
            [
                'name' => 'HOTEL DU LION D OR',
                'address' => '4 PLACE DE L EGLISE , 41210 ST VIATRE',
                'longitude' => 1.933359,
                'latitude' => 47.522960,
            ],

        ];
    }
}
