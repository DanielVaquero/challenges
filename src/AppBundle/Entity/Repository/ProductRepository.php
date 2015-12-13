<?php

namespace AppBundle\Entity\Repository;

use AppBundle\Entity\Product;

interface ProductRepository
{
    /**
     * @param Product $product
     */
    public function save(Product $product);

    /**
     * @return array
     */
    public function countByMonth();

    /**
     * @return array
     */
    public function countByMerchant();

}