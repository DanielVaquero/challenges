<?php

namespace AppBundle\Service;

use AppBundle\Entity\Repository\MerchantRepository;
use AppBundle\Entity\Repository\ProductRepository;

class ProductsByMonthAndByMerchantService
{
    /** @var ProductRepository */
    private $productRepository;

    /** @var MerchantRepository */
    private $merchantRepository;

    public function __construct(ProductRepository $productRepository, MerchantRepository $merchantRepository)
    {
        $this->productRepository = $productRepository;
        $this->merchantRepository = $merchantRepository;
    }

    public function byMonth()
    {
        return $this->productRepository->countByMonth();
    }

    public function byMerchant()
    {
        return $this->productRepository->countByMerchant();
    }
}