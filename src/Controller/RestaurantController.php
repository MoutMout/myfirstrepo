<?php

/*
 * This file is part of the promote-api package.
 *
 * (c) Bigz
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace App\Controller;

use App\Entity\Restaurant;
use App\Entity\Label;
use App\Form\Type\LabelType;
use Doctrine\Common\Persistence\ObjectRepository;
use FOS\RestBundle\Controller\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use FOS\RestBundle\Controller\Annotations as Rest;
use Halapi\Representation\PaginatedRepresentation;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * Class RestaurantController
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
     *     @SWG\Items(@Model(type=Restaurant::class))
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
     * @param Restaurant $Restaurant
     *
     * @return Restaurant
     */
    public function getRestaurantAction(Restaurant $restaurant)
    {
        return $restaurant;
    }
}
