<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="restaurant")
 * @ORM\Entity(repositoryClass="App\Repository\RestaurantRepository")
 * @ExclusionPolicy("All")
 */

class Restaurant
{
     /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Expose
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string")
     * @Assert\NotBlank()
     *
     * @Expose
     *
     */
    private $name;
    
    /**
     * @var string $address
     *
     * @ORM\Column(name="address", type="string")
     * @Assert\NotBlank()
     *
     * @Expose
     *
     */
    private $address;

    /**
     * @var float $latitude
     *
     * @ORM\Column(name="latitude", type="float")
     * @Assert\NotBlank()
     *
     * @Expose
     *
     */
    private $latitude;

     /**
     * @var float $longitude
     *
     * @ORM\Column(name="longitude", type="float")
     * @Assert\NotBlank()
     *
     * @Expose
     *
     */
    private $longitude;

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id):object 
    {
        $this->id = $id;
        
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }
}
