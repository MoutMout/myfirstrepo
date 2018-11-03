<?php

namespace App\Controller;

use App\Entity\Pos;
use App\Form\Type\PosType;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Wizards\RestBundle\Controller\JsonControllerTrait;
use WizardsRest\CollectionManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PosController.
 *
 * @Route("/poss")
 */
class PosController extends Controller
{
    use JsonControllerTrait;
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

    /**
     * Create a POS.
     *
     * @Route("", methods={"POST"})
     *
     * @SWG\Post(
     *     consumes={"application/vnd.api+json"},
     *     @SWG\Parameter(
     *        name="body",
     *        in="body",
     *        description="Pos to create",
     *        required=true,
     *        @SWG\Schema(
     *            type="object",
     *            @SWG\Property(property="data",
     *               @SWG\Property(property="type", type="string"),
     *               @SWG\Property(property="attributes", ref=@Model(type=PosType::class)),
     *               @SWG\Property(property="relationships",
     *                  @SWG\Property(property="location",
     *                      @SWG\Property(property="data",
     *                      @SWG\Property(property="id", type="string", default="1"),
     *                  )
     *                  ),
     *                  @SWG\Property(property="bank",
     *                      @SWG\Property(property="data",
     *                      @SWG\Property(property="id", type="string", default="1"),
     *                  )
     *                  ),
     *                  @SWG\Property(property="device",
     *                      @SWG\Property(property="data",
     *                      @SWG\Property(property="id", type="string", default="1"),
     *                  )
     *                  )
     *              )
     *            )
     *        )
     *     )
     * )
     * @SWG\Response(
     *     response=200,
     *     description="Get created pos",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Pos::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=404, description="Pos not found")
     *
     * @param Request $request
     *
     * @return Pos
     */
    public function create(Request $request)
    {
        $data = $request->getContent();
        $json = json_decode($data, true);
        $em = $this->getDoctrine()->getManager();

        $relationships = $json['data']['relationships'];
        $locationId = $relationships['location']['data']['id'];
        $deviceId = $relationships['device']['data']['id'];
        $bankId = $relationships['bank']['data']['id'];

        $pos = new Pos();
        $form = $this->createForm(PosType::class, $pos, ['method' => 'POST']);
        $this->handleJsonForm($form, $request);
        $pos->setLocation($em->getRepository('App:Location')->findOneById($locationId));

        //need to have correct path to get bankId and deviceId related to the pos
        $pos->setBank($em->getRepository('App:Bank')->findOneById($bankId));
        $pos->setDevice($em->getRepository('App:Device')->findOneById($deviceId));
        $pos->setCreatedAt((new \DateTime())->getTimestamp());
        $pos->setUpdatedAt((new \DateTime())->getTimestamp());
        $em->persist($pos);
        $em->flush();

        return $pos;
    }
}
