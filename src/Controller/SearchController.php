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
 * Class IndexController.
 */
class SearchController extends Controller
{
    use ControllerTrait;

    /**
     * Very minimalistic implementation of a search by location with postgis.
     *
     * @SWG\Parameter(name="lat", in="query", required=true, type="number", default=23.1)
     * @SWG\Parameter(name="lng", in="query", required=true, type="number", default=42.7)
     * @SWG\Parameter(name="radius", in="query", required=true, type="number", default=500)
     * @SWG\Response(
     *     response=200,
     *     description="Search by location results",
     * @SWG\Items(@Model(type=Restaurant::class))
     * )
     *
     * @param Request $request
     *
     * @return array|Response
     */
    public function getSearchAction(Request $request)
    {
        $latitude = $request->query->get('lat');
        $longitude = $request->query->get('lng');

        if (!$latitude || !$longitude) {
            return new Response('Invalid request', 400);
        }

        return $this
            ->getDoctrine()
            ->getRepository(Restaurant::class)
            ->findRestaurantByPosition((float) $latitude, (float) $longitude, 800);
    }
}
