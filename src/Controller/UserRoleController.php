<?php

namespace App\Controller;

use App\Entity\UserRole;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Annotation\Route;
use WizardsRest\CollectionManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * Class UserRoleController.
 *
 * @Route("/user-roles")
 */
class UserRoleController extends Controller
{
    /**
     * @var CollectionManager
     */
    private $userRole;

    /**
     * ArtistController constructor.
     *
     * @param CollectionManager $userRole
     */
    public function __construct(CollectionManager $userRole)
    {
        $this->userRole = $userRole;
    }

    /**
     * Get all user-roles.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated user-roles collection",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data", @SWG\Items(
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=UserRole::class))
     *          ))
     *    )
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getUserRolesAction(ServerRequestInterface $request): \Traversable
    {
        return $this->userRole->getPaginatedCollection(UserRole::class, $request);
    }

    /**
     * Get an User_role.
     *
     * @Route("/{id}", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get an User_role",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=UserRole::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=404, description="User_role not found")
     *
     * @param UserRole $userRole
     *
     * @return UserRole
     */
    public function getUserRoleAction(UserRole $userRole)
    {
        return $userRole;
    }
}
