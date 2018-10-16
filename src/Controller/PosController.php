<?php

namespace App\Controller;

use App\Entity\Pos;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Annotation\Route;
use WizardsRest\CollectionManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * Class PosController.
 *
 * @Route("/pos")
 */
class PosController extends Controller
{
    /**
     * @var CollectionManager
     */
    private $pos;

    /**
     * ArtistController constructor.
     *
     * @param CollectionManager $pos
     */
    public function __construct(CollectionManager $pos)
    {
        $this->pos = $pos;
    }

    /**
     * Get all POS.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated POS collection",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data", @SWG\Items(
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Pos::class))
     *          ))
     *    )
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getManyPosAction(ServerRequestInterface $request): \Traversable
    {
        return $this->pos->getPaginatedCollection(Pos::class, $request);
    }

    /**
     * Get a POS.
     *
     * @Route("/{id}", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get a POS",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Pos::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=404, description="POS not found")
     *
     * @param Pos $pos
     *
     * @return Pos
     */
    public function getPosAction(Pos $pos)
    {
        return $pos;
    }
}
