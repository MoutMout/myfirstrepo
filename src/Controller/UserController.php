<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\Type\UserType;
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
 * Class UserController.
 *
 * @Route("/users")
 */
class UserController extends Controller
{
    use JsonControllerTrait;

    /**
     * @var CollectionManager
     */
    private $user;

    /**
     * UserController constructor.
     *
     * @param CollectionManager $user
     */
    public function __construct(CollectionManager $user)
    {
        $this->user = $user;
    }

    /**
     * Get all Users.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated transaction collection",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data", @SWG\Items(
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=User::class))
     *          ))
     *    )
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getUsersAction(ServerRequestInterface $request): \Traversable
    {
        return $this->user->getPaginatedCollection(User::class, $request);
    }

    /**
     * Get an User.
     *
     * @Route("/{id}", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get an User",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=User::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=404, description="User not found")
     *
     * @param User $user
     *
     * @return User
     */
    public function getUserAction(User $user)
    {
        return $user;
    }

    /**
     * Create a User.
     *
     * @Route("", methods={"POST"})
     *
     * @SWG\Post(
     *     consumes={"application/vnd.api+json"},
     *     @SWG\Parameter(
     *        name="body",
     *        in="body",
     *        description="User to create",
     *        required=true,
     *        @SWG\Schema(
     *            type="object",
     *            @SWG\Property(property="data",
     *               @SWG\Property(property="type", type="string"),
     *               @SWG\Property(property="attributes", ref=@Model(type=UserType::class)),
     *                  @SWG\Property(property="relationships",
     *                     @SWG\Property(property="role",
     *                          @SWG\Property(property="data",
     *                          @SWG\Property(property="id", type="string", default="1"),
     *                          @SWG\Property(property="type", type="string", default="roles")
     *                         ),
     *                      ),
     *                     @SWG\Property(property="merchant",
     *                          @SWG\Property(property="data",
     *                          @SWG\Property(property="id", type="string", default="1"),
     *                          @SWG\Property(property="type", type="string", default="merchants")
     *                         ),
     *                      )
     *              )
     *            )
     *        )
     *     )
     * )
     * @SWG\Response(
     *     response=200,
     *     description="Get a transaction",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=User::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=404, description="User not found")
     *
     * @param Request $request
     *
     * @return User
     */
    public function create(Request $request)
    {
        $data = $request->getContent();
        $json = json_decode($data, true);
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(UserType::class, $user, ['method' => 'POST']);
        $this->handleJsonForm($form, $request);
        $user->setRole($em->getRepository('App:UserRole')->findOneById($json['data']['relationships']['role']['data']['id']));
        $user->setMerchant($em->getRepository('App:Merchant')->findOneById(1));
        $user->setCreatedAt((new \DateTime())->getTimestamp());
        $em->persist($user);
        $em->flush();

        return $user;
    }
}
