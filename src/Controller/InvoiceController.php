<?php

namespace App\Controller;

use App\Entity\Invoice;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;
use WizardsRest\CollectionManager;

/**
 * Class InvoiceController.
 *
 * @Route("/invoices")
 */
class InvoiceController extends Controller
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
     * Get all invoices.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated invoice collection",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data", @SWG\Items(
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Invoice::class))
     *          ))
     *    )
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getInvoicesAction(ServerRequestInterface $request): \Traversable
    {
        return $this->rest->getPaginatedCollection(Invoice::class, $request);
    }

    /**
     * Get a Invoice.
     *
     * @Route("/{id}", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get an invoice",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Invoice::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=404, description="Invoice not found")
     *
     * @param Invoice $invoice
     *
     * @return Invoice
     */
    public function getInvoiceAction(Invoice $invoice)
    {
        return $invoice;
    }
}
