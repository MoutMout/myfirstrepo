<?php

namespace App\Controller;

use App\Entity\Card;
use FOS\RestBundle\Controller\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Halapi\Representation\PaginatedRepresentation;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * Class CardController.
 */
class CardController extends Controller
{
    use ControllerTrait;

    /**
     * Get all cards.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated card collection",
     * @SWG\Items(@Model(type=Card::class))
     * )
     *
     * @return PaginatedRepresentation
     */
    public function getCardsAction()
    {
        return $this->get('bigz_halapi.pagination_factory')->getRepresentation(Card::class);
    }

    /**
     * Get a Card.
     *
     * @SWG\Response(response=200, description="Get a card", @Model(type=Card::class))
     * @SWG\Response(response=404, description="Card not found")
     *
     * @param Card $card
     *
     * @return Card
     */
    public function getCardAction(Card $card)
    {
        return $card;
    }
}
