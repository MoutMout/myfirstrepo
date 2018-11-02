<?php

namespace App\Controller;

use App\Entity\Device;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Annotation\Route;
use WizardsRest\CollectionManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * @Route("/devices")
 */
class DeviceController extends Controller
{
    /**
     * @var CollectionManager
     */
    private $collectionManager;

    /**
     * @param CollectionManager $cm
     */
    public function __construct(CollectionManager $cm)
    {
        $this->collectionManager = $cm;
    }

    /**
     * Get all devices.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated device collection",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data", @SWG\Items(
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Device::class))
     *          ))
     *    )
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getDevicesAction(ServerRequestInterface $request): \Traversable
    {
        return $this->collectionManager->getPaginatedCollection(Device::class, $request);
    }
}
