<?php

namespace App\Controller;

use App\Entity\Device;
use App\Entity\Language;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Routing\Annotation\Route;
use WizardsRest\CollectionManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;

/**
 * @Route("/languages")
 */
class LanguageController extends Controller
{
    /**
     * @var CollectionManager
     */
    private $collectionManager;

    /**
     * @param CollectionManager $cm
     */
    public function __construct(CollectionManager $cm)
    {
        $this->collectionManager = $cm;
    }

    /**
     * Get all languages.
     *
     * @Route("", methods={"GET"})
     *
     * @SWG\Response(
     *     response=200,
     *     description="Paginated language collection",
     *     schema=@SWG\Schema(type="object",
     *          @SWG\Property(property="data", @SWG\Items(
     *              @SWG\Property(property="id", type="string"),
     *              @SWG\Property(property="type", type="string"),
     *              @SWG\Property(property="attributes", ref=@Model(type=Language::class))
     *          ))
     *    )
     * )
     *
     * @param ServerRequestInterface $request
     *
     * @return \Traversable
     */
    public function getLanguagesAction(ServerRequestInterface $request): \Traversable
    {
        return $this->collectionManager->getPaginatedCollection(Language::class, $request);
    }
}
