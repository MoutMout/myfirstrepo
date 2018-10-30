<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Form\Type\CandidateType;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\Routing\Annotation\Route;
use Wizards\RestBundle\Controller\JsonControllerTrait;
use WizardsRest\CollectionManager;

/**
 * Class CandidateController.
 *
 * @Route("/candidates")
 */
class CandidateController extends Controller
{
    use JsonControllerTrait;

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
     * Get all candidates.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated candidate collection",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data", @SWG\Items(
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Candidate::class))
     *          ))
     *    )
     * )
     *
     * @Route("", methods={"GET"})
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getCandidatesAction(ServerRequestInterface $request): \Traversable
    {
        return $this->rest->getPaginatedCollection(Candidate::class, $request);
    }

    /**
     * Get a Candidate.
     *
     * @Route("/{id}", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Get a candidate",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Candidate::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=404, description="Candidate not found")
     *
     * @param Candidate $candidate
     *
     * @return Candidate
     */
    public function getCandidateAction(Candidate $candidate)
    {
        return $candidate;
    }

    /**
     * Patch a Candidate.
     *
     * @Route("/{id}", methods={"PATCH"})
     *
     * @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     description="Candidate to patch",
     *     required=true,
     *     @SWG\Schema(
     *          @SWG\Property(property="candidate", ref=@Model(type=CandidateType::class))
     *     )
     * )
     * @SWG\Response(
     *     response=200,
     *     description="Get a candidate",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data",
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Candidate::class))
     *          )
     *    )
     * )
     * @SWG\Response(response=400, description="Invalid Request")
     * @SWG\Response(response=404, description="Candidate not found")
     *
     * @param Request   $request
     * @param Candidate $candidate
     *
     * @return mixed
     */
    public function patchCandidateAction(Request $request, Candidate $candidate)
    {
        $form = $this->createForm(CandidateType::class, $candidate, ['method' => 'PATCH']);
        $this->handleJsonForm($form, $request);
        $em = $this->getDoctrine()->getManager();
        $em->persist($candidate);
        $em->flush();

        return $candidate;
    }
}
