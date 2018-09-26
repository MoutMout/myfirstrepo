<?php

namespace App\Controller;

use App\Entity\Card;
use App\Form\Type\CardType;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;
use Wizards\RestBundle\Controller\JsonControllerTrait;
use WizardsRest\CollectionManager;

/**
 * Class CardController.
 * @Route("/cards")
 */
class CardController extends Controller
{
    use JsonControllerTrait;

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
     * Get all cards.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated card collection",
     * @SWG\Items(@Model(type=Card::class))
     * )
     *
     * @Route("", methods={"GET"})
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getCardsAction(ServerRequestInterface $request): \Traversable
    {
        return $this->rest->getPaginatedCollection(Card::class, $request);
    }

    /**
     * Get a Card.
     *
     * @Route("/{id}", methods={"GET"})
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
     * @Route("/{id}", methods={"PATCH"})
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
        $this->handleJsonForm($form, $request);
        $em = $this->getDoctrine()->getManager();
        $em->persist($card);
        $em->flush();

        return $card;
    }
}
