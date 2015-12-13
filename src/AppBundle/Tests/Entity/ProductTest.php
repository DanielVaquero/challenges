<?php

namespace AppBundle\Tests\Entity;

use AppBundle\Entity\Product;
use PHPUnit_Framework_TestCase;

class ProductTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function itShouldCreateValidProduct()
    {
        $product = ProductBuilder::buildDefaultProductWithMerchant();

        $this->assertInstanceOf(Product::class, $product);
    }

    /**
     * @test
     */
    public function itShouldThrowInvalidArgumentExceptionWhenWeSetNotMerchantType()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        $product = ProductBuilder::buildDefaultProductWithMerchant();

        $product->setMerchant('string');
    }

}