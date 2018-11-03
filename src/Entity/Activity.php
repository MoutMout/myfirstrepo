<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use WizardsRest\Annotation\Exposable;
use Symfony\Component\Validator\Constraints as Assert;
use WizardsRest\Annotation\Type;
use WizardsRest\Annotation\Embeddable;

/**
 * @ORM\Table(name="activity")
 * @ORM\Entity()
 *
 * @Type("activities")
 */
class Activity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Exposable
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string")
     *
     * @Assert\NotBlank()
     *
     * @Exposable
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Activity", mappedBy="parentActivity")
     *
     * @Embeddable()
     */
    private $subActivities;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Activity", inversedBy="subActivities")
     *
     * @Embeddable()
     */
    private $parentActivity;

    /**
     * @return Activity[]
     */
    public function getSubActivities()
    {
        return $this->subActivities;
    }

    /**
     * @param Activity[] $subActivities
     */
    public function setSubActivities($subActivities): void
    {
        $this->subActivities = $subActivities;
    }

    /**
     * @return Activity
     */
    public function getParentActivity()
    {
        return $this->parentActivity;
    }

    /**
     * @param Activity $activity
     */
    public function setParentActivity(Activity $activity): void
    {
        $this->parentActivity = $activity;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
