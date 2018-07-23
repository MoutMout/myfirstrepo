<?php

namespace spec\App\Entity;

use App\Entity\Bloc;
use PhpSpec\ObjectBehavior;

class BlocSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Bloc::class);
    }
    function it_has_an_id_setter()
    {
        $this->setId(42)->shouldReturn($this);
    }

    function it_has_an_id()
    {
        $this->setId(42);
        $this->getId()->shouldReturn(42);
    }

    function it_has_a_body_setter()
    {
        $this->setBody('test')->shouldReturn($this);
    }

    function it_has_a_body()
    {
        $this->setBody('test');
        $this->getBody()->shouldBeString();
        $this->getBody()->shouldBe('test');
    }
}
