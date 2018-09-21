<?php

namespace App\Controller;

use App\Entity\Transaction;
use FOS\RestBundle\Controller\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Halapi\Representation\PaginatedRepresentation;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * Class TransactionController.
 */
class TransactionController extends Controller
{
    use ControllerTrait;

    /**
     * Get all$transactions.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated$transaction collection",
     * @SWG\Items(@Model(type=Transaction::class))
     * )
     *
     * @return PaginatedRepresentation
     */
    public function getTransactionsAction()
    {
        return $this->get('bigz_halapi.pagination_factory')->getRepresentation(Transaction::class);
    }

    /**
     * Get a Transaction.
     *
     * @SWG\Response(response=200, description="Get a$transaction", @Model(type=Transaction::class))
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
