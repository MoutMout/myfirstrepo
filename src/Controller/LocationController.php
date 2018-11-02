<?php

namespace App\Controller;

use App\Entity\Location;
use App\Entity\Merchant;
use App\Form\Type\LocationType;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Wizards\RestBundle\Controller\JsonControllerTrait;
use WizardsRest\CollectionManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class LocationController.
 *
 * @Route("/locations")
 */
class LocationController extends Controller
{
    use JsonControllerTrait;
    /**
     * @var CollectionManager
     */
    private $location;

    /**
     * LocationController constructor.
     *
     * @param CollectionManager $location
     */
    public function __construct(CollectionManager $location)
    {
        $this->location = $location;
    }

    /**
     * Get all locations.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated location collection",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data", @SWG\Items(
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Location::class))
     *          ))
     *    )
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getLocationsAction(ServerRequestInterface $request): \Traversable
    {
        return $this->location->getPaginatedCollection(Location::class, $request);
    }

    /**
     * Get a Location.
     *
     * @Route("/{id}", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get a location",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Location::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=404, description="Location not found")
     *
     * @param Location $location
     *
     * @return Location
     */
    public function getLocationAction(Location $location)
    {
        return $location;
    }

    /**
     * Create a Location.
     *
     * @Route("", methods={"POST"})
     *
     * @SWG\Post(
     *     consumes={"application/vnd.api+json"},
     *     @SWG\Parameter(
     *        name="body",
     *        in="body",
     *        description="Location to create",
     *        required=true,
     *        @SWG\Schema(
     *            type="object",
     *            @SWG\Property(property="data",
     *               @SWG\Property(property="type", type="string", default="locations"),
     *               @SWG\Property(property="attributes", ref=@Model(type=LocationType::class)),
     *               @SWG\Property(property="relationships",
     *                  @SWG\Property(property="activity",
     *                      @SWG\Property(property="data",
     *                          @SWG\Property(property="id", type="string", default="1"),
     *                          @SWG\Property(property="type", type="string", default="activities")
     *                      ),
     *                  ),
     *                  @SWG\Property(property="merchant",
     *                      @SWG\Property(property="data",
     *                          @SWG\Property(property="id", type="string", default="1"),
     *                          @SWG\Property(property="type", type="string", default="merchants")
     *                      ),
     *                  )
     *              )
     *            )
     *        )
     *     )
     * )
     * @SWG\Response(
     *     response=200,
     *     description="Get created location",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Location::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=404, description="Location not found")
     *
     * @param Request $request
     *
     * @return Location
     */
    public function create(Request $request)
    {
        $data = $request->getContent();
        $json = json_decode($data, true);
        $em = $this->getDoctrine()->getManager();
        $location = new Location();
        $form = $this->createForm(LocationType::class, $location, ['method' => 'POST']);
        $this->handleJsonForm($form, $request);

        $relationships = $json['data']['relationships'];
        $merchantId = $relationships['merchant']['data']['id'];
        $activityId = $relationships['activity']['data']['id'];

        $merchant = $em->getRepository('App:Merchant')->findOneById($merchantId);
        /* @var Merchant $merchant */
        $merchant->setOnboarding(false);

        $location->setMerchant($merchant);
        $location->setActivity($em->getRepository('App:Activity')->findOneById($activityId));

        if (!empty($relationships['bisActivity']['data']['id'])) {
            $location->setBisActivity($em->getRepository('App:Activity')->findOneById($relationships['bisActivity']['data']['id']));
        }

        if (!empty($relationships['terActivity']['data']['id'])) {
            $location->setTerActivity($em->getRepository('App:Activity')->findOneById($relationships['terActivity']['data']['id']));
        }

        $location->setCreatedAt((new \DateTime())->getTimestamp());
        $location->setUpdatedAt((new \DateTime())->getTimestamp());

        // add all products to location
        if (!empty($json['data']['relationships']['products'])) {
            foreach ($json['data']['relationships']['products']['data'] as $product) {
                $location->setProduct($em->getRepository('App:Product')->findOneById($product['id']));
            }
        }

        // add all users to location
        if (!empty($json['data']['relationships']['users'])) {
            foreach ($json['data']['relationships']['users']['data'] as $user) {
                $location->setUser($em->getRepository('App:User')->findOneById($user['id']));
            }
        }

        $em->persist($merchant);
        $em->persist($location);
        $em->flush();

        return $location;
    }
}
