<?php

namespace AppBundle\Tests\Entity;

use AppBundle\Entity\Merchant;
use PHPUnit_Framework_TestCase;

class MerchantTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function itShouldCreateValidMerchant()
    {
        $merchant = $this->buildDefaultMerchant();

        $this->assertInstanceOf(Merchant::class, $merchant);
    }

    /**
     * @test
     */
    public function itShouldThrowInvalidArgumentExceptionWhenSetEmptyName()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        $merchant = $this->buildDefaultMerchant();
        $merchant->setName(null);
    }

    /**
     * @test
     */
    public function itShouldThrowInvalidArgumentExceptionWhenSetNameWithInvalidValue()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        $merchant = $this->buildDefaultMerchant();
        $merchant->setName(100);
    }

    /**
     * @test
     */
    public function itShouldThrowInvalidArgumentExceptionWhenSetEmptyAddress()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        $merchant = $this->buildDefaultMerchant();
        $merchant->setAddress(null);
    }

    /**
     * @test
     */
    public function itShouldThrowInvalidArgumentExceptionWhenSetAddressWithInvalidValue()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        $merchant = $this->buildDefaultMerchant();
        $merchant->setName(100);
    }

    private function buildDefaultMerchant()
    {
        return new Merchant('Name', 'Address');
    }

}