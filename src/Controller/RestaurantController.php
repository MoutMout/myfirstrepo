<?php

namespace App\Controller;

use App\Entity\Restaurant;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;
use WizardsRest\CollectionManager;

/**
 * Class RestaurantController.
 *
 * @Route("/restaurants")
 */
class RestaurantController extends Controller
{
    /**
     * @var CollectionManager
     */
    private $rest;

    /**
     * ArtistController constructor.
     * @param CollectionManager $rest
     */
    public function __construct(CollectionManager $rest)
    {
        $this->rest = $rest;
    }

    /**
     * Get all restaurants.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated restaurant collection",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data", @SWG\Items(
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Restaurant::class))
     *          ))
     *    )
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getRestaurantsAction(ServerRequestInterface $request): \Traversable
    {
        return $this->rest->getPaginatedCollection(Restaurant::class, $request);
    }

    /**
     * Get a Restaurant.
     *
     * @Route("/{id}", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get a restaurant",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Restaurant::class))
     *          )
     *    )
     * )
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
