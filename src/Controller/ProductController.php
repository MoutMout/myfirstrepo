<?php

namespace App\Controller;

use App\Entity\Product;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;
use WizardsRest\CollectionManager;

/**
 * Class ProductController.
 *
 * @Route("/products")
 */
class ProductController extends Controller
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
     * Get all products.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="activity collection",
     * @SWG\Items(@Model(type=Product::class))
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getProductsAction(ServerRequestInterface $request): \Traversable
    {
        return $this->rest->getPaginatedCollection(Product::class, $request);
    }

    /**
     * Get a Product.
     *
     * @Route("/{id}", methods={"GET"})
     *
     * @SWG\Response(response=200, description="Get a product", @Model(type=Product::class))
     * @SWG\Response(response=404, description="Product not found")
     *
     * @param Product $product
     *
     * @return Product
     */
    public function getProductAction(Product $product)
    {
        return $product;
    }
}
