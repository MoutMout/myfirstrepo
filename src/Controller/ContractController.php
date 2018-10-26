<?php

namespace App\Controller;

use App\Entity\Contract;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;
use WizardsRest\CollectionManager;

/**
 * Class ContractController.
 *
 * @Route("/contracts")
 */
class ContractController extends Controller
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
     * Get all contracts.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated contract collection",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data", @SWG\Items(
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Contract::class))
     *          ))
     *    )
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getContractsAction(ServerRequestInterface $request): \Traversable
    {
        return $this->rest->getPaginatedCollection(Contract::class, $request);
    }

    /**
     * Get a Contract.
     *
     * @Route("/{id}", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get a contract",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Contract::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=404, description="Contract not found")
     *
     * @param Contract $contract
     *
     * @return Contract
     */
    public function getMerchantAction(Contract $contract)
    {
        return $contract;
    }
}
