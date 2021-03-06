<?php

namespace spec\App\Entity;

use App\Entity\Store;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StoreSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Store::class);
    }

    function it_has_an_id_setter()
    {
        $this->setId(42);
    }

    function it_has_an_id()
    {
        $this->setId(42);
        $this->getId()->shouldReturn(42);
    }

    function it_has_a_name_setter()
    {
        $this->setName("toto")->shouldReturn($this);
    }

    function it_has_a_name()
    {
        $this->setName("toto");
        $this->getName()->shouldReturn("toto");
    }

    function it_has_an_address_setter()
    {
        $this->setAddress("toto")->shouldReturn($this);
    }

    function it_has_an_address()
    {
        $this->setAddress("toto");
        $this->getAddress()->shouldReturn("toto");
    }

    function it_has_a_country_id_setter()
    {
        $this->setCountryId(42)->shouldReturn($this);
    }

    function it_has_a_country_id()
    {
        $this->setCountryId(42);
        $this->getCountryId()->shouldReturn(42);
    }

    function it_has_a_latitude_setter()
    {
        $this->setLatitude(45.4)->shouldReturn($this);
    }

    function it_has_a_latitude()
    {
        $this->setLatitude(45.4);
        $this->getLatitude()->shouldReturn(45.4);
    }

    function it_has_a_longitude_setter()
    {
        $this->setLongitude(45.4)->shouldReturn($this);
    }

    function it_has_a_longitude()
    {
        $this->setLongitude(45.4);
        $this->getLongitude()->shouldReturn(45.4);
    }

}
