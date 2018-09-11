<?php

namespace App\Controller;

use App\Entity\Activity;
use FOS\RestBundle\Controller\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Halapi\Representation\PaginatedRepresentation;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

class ActivityController extends Controller
{
    use ControllerTrait;

    /**
     * Get all activities.
     *
     * @SWG\Response(
     *     response=200,
     *     description="activity collection",
     * @SWG\Items(@Model(type=Activity::class))
     * )
     *
     * @return PaginatedRepresentation
     */
    public function getActivitysAction()
    {
        return $this->get('bigz_halapi.pagination_factory')->getRepresentation(Activity::class);
    }

    /**
     * Get a Activity.
     *
     * @SWG\Response(response=200, description="Get a restaurant", @Model(type=Activity::class))
     * @SWG\Response(response=404, description="Restaurant not found")
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
