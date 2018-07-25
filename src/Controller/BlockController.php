<?php

/*
 * This file is part of the promote-api package.
 *
 * (c) Bigz
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace App\Controller;

use App\Entity\Block;
use App\Entity\Label;
use App\Form\Type\LabelType;
use Doctrine\Common\Persistence\ObjectRepository;
use FOS\RestBundle\Controller\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use FOS\RestBundle\Controller\Annotations as Rest;
use Halapi\Representation\PaginatedRepresentation;
use Symfony\Component\HttpFoundation\Response;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * Class LabelController
 * @author Romain Richard
 */
class BlockController extends Controller
{
    use ControllerTrait;

    /**
     * Get all blocs.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated block collection",
     *     @SWG\Items(@Model(type=Block::class))
     * )
     *
     * @return PaginatedRepresentation
     */
    public function getBlocksAction()
    {
        return $this->get('bigz_halapi.pagination_factory')->getRepresentation(Block::class);
    }

    /**
     * Get a Block.
     *
     * @SWG\Response(response=200, description="Get a block", @Model(type=Block::class))
     * @SWG\Response(response=404, description="Block not found")
     *
     * @param Block $block
     *
     * @return Block
     */
    public function getBlockAction(Block $block)
    {
        return $block;
    }
}
