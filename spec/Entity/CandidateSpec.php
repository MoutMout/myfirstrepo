<?php

namespace spec\App\Entity;

use App\Entity\Candidate;
use PhpSpec\ObjectBehavior;

class CandidateSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Candidate::class);
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

    function it_has_a_cnp_setter()
    {
        $this->setCnp("1961226308352")->shouldReturn($this);
    }

    function it_has_a_cnp()
    {
        $this->setCnp("1961226308352");
        $this->getCnp()->shouldReturn("1961226308352");
    }

    function it_has_a_firstName_setter()
    {
        $this->setFirstName("Palpatin")->shouldReturn($this);
    }

    function it_has_a_firstName()
    {
        $this->setFirstName("Palpatin");
        $this->getFirstName()->shouldReturn("Palpatin");
    }

    function it_has_a_lastName_setter()
    {
        $this->setLastName("Obiwan")->shouldReturn($this);
    }

    function it_has_a_lastName()
    {
        $this->setLastName("Obiwan");
        $this->getLastName()->shouldReturn("Obiwan");
    }

    function it_has_an_isActive_setter()
    {
        $this->setIsActive(true)->shouldReturn($this);
    }

    function it_has_an_isActive()
    {
        $this->setIsActive(true);
        $this->getIsActive()->shouldReturn(true);
    }

}
