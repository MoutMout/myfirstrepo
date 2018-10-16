<?php

namespace App\Controller;

use App\Entity\Organisation;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;
use WizardsRest\CollectionManager;

/**
 * Class OrganisationController.
 *
 * @Route("/organisations")
 */
class OrganisationController extends Controller
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
     * Get all organisations.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated organisation collection",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data", @SWG\Items(
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Organisation::class))
     *          ))
     *    )
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getOrganisationsAction(ServerRequestInterface $request): \Traversable
    {
        return $this->rest->getPaginatedCollection(Organisation::class, $request);
    }

    /**
     * Get a Organisation.
     *
     * @Route("/{id}", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get a organisation",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Organisation::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=404, description="Organisation not found")
     *
     * @param Organisation $organisation
     *
     * @return Organisation
     */
    public function getOrganisationAction(Organisation $organisation)
    {
        return $organisation;
    }
}
