<?php

namespace App\Controller;

use App\Entity\Product;
use FOS\RestBundle\Controller\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Halapi\Representation\PaginatedRepresentation;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

class ProductController extends Controller
{
    use ControllerTrait;

    /**
     * Get all products.
     *
     * @SWG\Response(
     *     response=200,
     *     description="activity collection",
     * @SWG\Items(@Model(type=Product::class))
     * )
     *
     * @return PaginatedRepresentation
     */
    public function getProductsAction()
    {
        return $this->get('bigz_halapi.pagination_factory')->getRepresentation(Product::class);
    }

    /**
     * Get a Product.
     *
     * @SWG\Response(response=200, description="Get a restaurant", @Model(type=Product::class))
     * @SWG\Response(response=404, description="Restaurant not found")
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
