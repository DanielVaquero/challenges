<?php

namespace AppBundle\Tests\Entity;


use AppBundle\Entity\Merchant;
use AppBundle\Entity\Product;

class ProductBuilder
{
    public static function buildDefaultProductWithMerchant(Merchant $merchant = null)
    {
        return new Product(
            'Product Test',
            'Description Test',
            100,
            new \DateTime(),
            new \DateTime('tomorrow'),
            'available',
            $merchant?: new Merchant('name', 'adress')
        );
    }
}