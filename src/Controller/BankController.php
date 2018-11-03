<?php

namespace App\Controller;

use App\Entity\Bank;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Annotation\Route;
use WizardsRest\CollectionManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * @Route("/banks")
 */
class BankController extends Controller
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
     * Get all banks.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated bank collection",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data", @SWG\Items(
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Bank::class))
     *          ))
     *    )
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getBanksAction(ServerRequestInterface $request): \Traversable
    {
        return $this->collectionManager->getPaginatedCollection(Bank::class, $request);
    }
}
