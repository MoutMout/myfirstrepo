<?php

namespace App\Controller;

use App\Entity\InvoiceTransaction;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Annotation\Route;
use WizardsRest\CollectionManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * Class InvoiceTransactionController.
 *
 * @Route("/invoice-transactions")
 */
class InvoiceTransactionController extends Controller
{
    /**
     * @var CollectionManager
     */
    private $collectionManager;

    /**
     * InvoiceTransactionController constructor.
     *
     * @param CollectionManager $collectionManager
     */
    public function __construct(CollectionManager $collectionManager)
    {
        $this->collectionManager = $collectionManager;
    }

    /**
     * Get all Invoice transactions.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated InvoiceTransaction collection",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data", @SWG\Items(
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=InvoiceTransaction::class))
     *          ))
     *    )
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getInvoiceTransactionsAction(ServerRequestInterface $request): \Traversable
    {
        return $this->collectionManager->getPaginatedCollection(InvoiceTransaction::class, $request);
    }

    /**
     * Get an InvoiceTransaction.
     *
     * @Route("/{id}", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get an InvoiceTransaction",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=InvoiceTransaction::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=404, description="POS not found")
     *
     * @param InvoiceTransaction $transaction
     *
     * @return InvoiceTransaction
     */
    public function getInvoiceTransactionAction(InvoiceTransaction $transaction)
    {
        return $transaction;
    }
}
