<?php

namespace App\Controller;

use App\Entity\Restaurant;
use FOS\RestBundle\Controller\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * Find closest restaurants
 */
class ClosestRestaurantController extends Controller
{
    use ControllerTrait;

    /**
     * Very minimalistic implementation of a closest restaurant search by name & address
     *
     * @SWG\Parameter(name="lat", in="query", required=true, type="number", default=23.1)
     * @SWG\Parameter(name="lng", in="query", required=true, type="number", default=42.7)
     * @SWG\Parameter(name="search", in="query", required=true, type="string", default="test")
     * @SWG\Response(
     *     response=200,
     *     description="Search by name & address results",
     * @SWG\Items(@Model(type=Restaurant::class))
     * )
     *
     * @param Request $request
     *
     * @return array|Response
     */
    public function getClosestrestaurantsAction(Request $request)
    {
        $latitude = $request->query->get('lat');
        $longitude = $request->query->get('lng');
        $search = $request->query->get('search');

        if (!$latitude || !$longitude || !$search) {
            return new Response('Invalid request', 400);
        }

        return $this
            ->getDoctrine()
            ->getRepository(Restaurant::class)
            ->findClosestRestaurants((float) $latitude, (float) $longitude, $search);
    }
}
