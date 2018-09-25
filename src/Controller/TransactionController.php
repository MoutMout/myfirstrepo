<?php

namespace App\Controller;

use App\Entity\Transaction;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Annotation\Route;
use WizardsRest\CollectionManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * Class TransactionController.
 * @Route("/transactions")
 */
class TransactionController extends Controller
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
     * Get all transactions.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated$transaction collection",
     * @SWG\Items(@Model(type=Transaction::class))
     * )
     */
    public function getTransactionsAction(ServerRequestInterface $request): \Traversable
    {
        return $this->rest->getPaginatedCollection(Transaction::class, $request);
    }

    /**
     * Get a Transaction.
     *
     * @Route("/{id}", methods={"GET"})
     *
     * @SWG\Response(response=200, description="Get a transaction", @Model(type=Transaction::class))
     * @SWG\Response(response=404, description="Transaction not found")
     *
     * @param Transaction $transaction
     *
     * @return Transaction
     */
    public function getTransactionAction(Transaction $transaction)
    {
        return $transaction;
    }
}
