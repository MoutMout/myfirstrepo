<?php

namespace spec\App\Entity;

use App\Entity\Restaurant;
use PhpSpec\ObjectBehavior;

class RestaurantSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Restaurant::class);
    }

    public function it_has_an_id_setter()
    {
        $this->setId(42);
    }

    public function it_has_an_id()
    {
        $this->setId(42);
        $this->getId()->shouldReturn(42);
    }

    public function it_has_a_name_setter()
    {
        $this->setName('toto')->shouldReturn($this);
    }

    public function it_has_a_name()
    {
        $this->setName('toto');
        $this->getName()->shouldReturn('toto');
    }

    public function it_has_an_address_setter()
    {
        $this->setAddress('toto')->shouldReturn($this);
    }

    public function it_has_an_address()
    {
        $this->setAddress('toto');
        $this->getAddress()->shouldReturn('toto');
    }

    public function it_has_a_latitude_setter()
    {
        $this->setLatitude(45.4)->shouldReturn($this);
    }

    public function it_has_a_latitude()
    {
        $this->setLatitude(45.4);
        $this->getLatitude()->shouldReturn(45.4);
    }

    public function it_has_a_longitude_setter()
    {
        $this->setLongitude(45.4)->shouldReturn($this);
    }

    public function it_has_a_longitude()
    {
        $this->setLongitude(45.4);
        $this->getLongitude()->shouldReturn(45.4);
    }
}
