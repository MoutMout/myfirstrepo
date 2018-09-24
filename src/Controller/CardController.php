<?php

namespace App\Controller;

use App\Entity\Card;
use App\Form\Type\CardType;
use FOS\RestBundle\Controller\ControllerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * Patch a Card.
     *
     * @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     description="Card to patch",
     *     required=true,
     *     @SWG\Schema(
     *          @SWG\Property(property="card", ref=@Model(type=CardType::class))
     *     )
     * )
     * @SWG\Response(response=200, description="Card updated", @Model(type=Card::class))
     * @SWG\Response(response=400, description="Invalid Request")
     * @SWG\Response(response=404, description="Card not found")
     *
     * @param Request $request
     * @param Card    $card
     *
     * @return mixed
     */
    public function patchCardAction(Request $request, Card $card)
    {
        $form = $this->createForm(CardType::class, $card, ['method' => 'PATCH']);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($card);
            $manager->flush();

            return $card;
        }

        return $this->view($form, 400);
    }
}
