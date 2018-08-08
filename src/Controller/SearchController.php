<?php

namespace App\Controller;

use App\Entity\Restaurant;
use FOS\RestBundle\Controller\ControllerTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;


/**
 * Class IndexController.
 */
class SearchController extends Controller
{
    use ControllerTrait;

    /**
     * Very minimalistic implementation of a search by location with postgis.
     */
    public function getSearchAction(Request $request)
    {
        $latitude = $request->query->get('lat');
        $longitude = $request->query->get('lng');
        $radius = $request->query->get('radius');

        if (!$latitude || !$longitude || !$radius) {
            return new Response('Invalid request', 400);
        }

        return $this
            ->getDoctrine()
            ->getRepository(Restaurant::class)
            ->findRestaurantByPosition((float) $latitude, (float) $longitude, (int) $radius);
    }
}
