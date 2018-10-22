<?php

namespace App\Controller;

use App\Entity\User;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Annotation\Route;
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
        $manager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setFirstname($json['data']['attributes']['firstName']);
        $user->setLastname($json['data']['attributes']['lastName']);
        $user->setEmail($json['data']['attributes']['email']);
        $user->setPhone($json['data']['attributes']['phone']);
        $user->setRole($manager->getRepository('App:UserRole')->findOneById($json['data']['attributes']['role']));
        $user->setMerchant($manager->getRepository('App:Merchant')->findOneById(1));
        $user->setCreatedAt(20181011);
        $user->setUpdatedAt(20181018);

        $manager->persist($user);
        $manager->flush();

        return $user;
    }
}
