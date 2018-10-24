<?php

namespace spec\App\Entity;

use App\Entity\Card;
use PhpSpec\ObjectBehavior;
use \DateTime;

class CardSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Card::class);
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

    function it_has_an_userId_setter()
    {
        $this->setUserId('666')->shouldReturn($this);
    }

    function it_has_an_userId()
    {
        $this->setUserId('666');
        $this->getUserId()->shouldReturn('666');
    }

    function it_has_an_type_setter()
    {
        $this->setType("you are my type babe")->shouldReturn($this);
    }

    function it_has_an_type()
    {
        $this->setType("you are my type babe");
        $this->getType()->shouldReturn("you are my type babe");
    }

    function it_has_a_numbers_setter()
    {
        $this->setNumbers("7890")->shouldReturn($this);
    }

    function it_has_a_numbers()
    {
        $this->setNumbers("7890");
        $this->getNumbers()->shouldReturn("7890");
    }

    function it_has_a_company_setter()
    {
        $this->setCompany("sodexo")->shouldReturn($this);
    }

    function it_has_a_company()
    {
        $this->setCompany("sodexo");
        $this->getCompany()->shouldReturn("sodexo");
    }

    function it_has_a_isActive_setter()
    {
        $this->setIsActive(true)->shouldReturn($this);
    }

    function it_has_a_isActive()
    {
        $this->setIsActive(true);
        $this->getIsActive()->shouldReturn(true);
    }

    function it_has_a_expireAt_setter()
    {
        $date = new DateTime('2030-12-31 23:59:59');
        $this->setExpireAt($date)->shouldReturn($this);
    }

    function it_has_a_expireAt()
    {
        $date = new DateTime('2030-12-31 23:59:59');
        $this->setExpireAt($date);
        $this->getExpireAt()->shouldReturn($date);
    }

    function it_has_a_country_setter()
    {
        $this->setCountry("fr")->shouldReturn($this);
    }

    function it_has_a_country()
    {
        $this->setCountry("fr");
        $this->getCountry()->shouldReturn("fr");
    }

    function it_has_an_balance_setter()
    {
        $this->setBalance(504.5);
    }

    function it_has_an_balance()
    {
        $this->setBalance(504.5);
        $this->getBalance()->shouldReturn(504.5);
    }

    function it_has_a_currency_setter()
    {
        $this->setCurrency("EUR")->shouldReturn($this);
    }

    function it_has_a_currency()
    {
        $this->setCurrency("EUR");
        $this->getCurrency()->shouldReturn("EUR");
    }



}
