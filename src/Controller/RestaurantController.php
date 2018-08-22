<?php

namespace App\Controller;

use App\Entity\Restaurant;
use FOS\RestBundle\Controller\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Halapi\Representation\PaginatedRepresentation;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * Class RestaurantController.
 *
 * @author Valentin VARVEROPOULOS
 */
class RestaurantController extends Controller
{
    use ControllerTrait;

    /**
     * Get all restaurants.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated restaurant collection",
     * @SWG\Items(@Model(type=Restaurant::class))
     * )
     *
     * @return PaginatedRepresentation
     */
    public function getRestaurantsAction()
    {
        return $this->get('bigz_halapi.pagination_factory')->getRepresentation(Restaurant::class);
    }

    /**
     * Get a Restaurant.
     *
     * @SWG\Response(response=200, description="Get a restaurant", @Model(type=Restaurant::class))
     * @SWG\Response(response=404, description="Restaurant not found")
     *
     * @param Restaurant $restaurant
     *
     * @return Restaurant
     */
    public function getRestaurantAction(Restaurant $restaurant)
    {
        return $restaurant;
    }
}
