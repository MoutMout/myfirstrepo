<?php

namespace spec\App\Entity;

use App\Entity\Transaction;
use PhpSpec\ObjectBehavior;
use \DateTime;

class TransactionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Transaction::class);
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

    function it_has_a_card_setter()
    {
        $this->setCard(666)->shouldReturn($this);
    }

    function it_has_a_card()
    {
        $this->setCard(666);
        $this->getCard()->shouldReturn(666);
    }

    function it_has_a_type_setter()
    {
        $this->setType("you are my type babe")->shouldReturn($this);
    }

    function it_has_a_type()
    {
        $this->setType("you are my type babe");
        $this->getType()->shouldReturn("you are my type babe");
    }

    function it_has_an_isCredit_setter()
    {
        $this->setIsCredit(true)->shouldReturn($this);
    }

    function it_has_an_isCredit()
    {
        $this->setIsCredit(true);
        $this->getIsCredit()->shouldReturn(true);
    }

    function it_has_a_description_setter()
    {
        $this->setDescription("You owe me money mudafaka")->shouldReturn($this);
    }

    function it_has_a_description()
    {
        $this->setDescription("You owe me money mudafaka");
        $this->getDescription()->shouldReturn("You owe me money mudafaka");
    }

    function it_has_a_date_setter()
    {
        $date = new DateTime('2030-12-31 23:59:59');
        $this->setDate($date)->shouldReturn($this);
    }

    function it_has_a_date()
    {
        $date = new DateTime('2030-12-31 23:59:59');
        $this->setDate($date);
        $this->getDate()->shouldReturn($date);
    }

    function it_has_a_value_setter()
    {
        $this->setValue(983443.50);
    }

    function it_has_a_value()
    {
        $this->setValue(983443.50);
        $this->getValue()->shouldReturn(983443.50);
    }
}
