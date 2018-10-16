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
}
