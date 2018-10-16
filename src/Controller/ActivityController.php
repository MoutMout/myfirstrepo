<?php

namespace App\Controller;

use App\Entity\Activity;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;
use WizardsRest\CollectionManager;

/**
 * Class ActivityController.
 *
 * @Route("/activities")
 */
class ActivityController extends Controller
{
    /**
     * @var CollectionManager
     */
    private $rest;

    /**
     * ArtistController constructor.
     *
     * @param CollectionManager $rest
     */
    public function __construct(CollectionManager $rest)
    {
        $this->rest = $rest;
    }

    /**
     * Get all activities.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="activity collection",
     * @SWG\Items(@Model(type=Activity::class))
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getActivitiesAction(ServerRequestInterface $request): \Traversable
    {
        return $this->rest->getPaginatedCollection(Activity::class, $request);
    }

    /**
     * Get a Activity.
     *
     * @Route("/{id}", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get an Activity",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Activity::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=404, description="Activity not found")
     *
     * @param Activity $activity
     *
     * @return Activity
     */
    public function getActivityAction(Activity $activity)
    {
        return $activity;
    }
}
