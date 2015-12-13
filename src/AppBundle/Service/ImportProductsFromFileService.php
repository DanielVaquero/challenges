<?php

namespace AppBundle\Service;

use AppBundle\Entity\Merchant;
use AppBundle\Entity\Product;
use AppBundle\Entity\Repository\MerchantRepository;
use AppBundle\Entity\Repository\ProductRepository;

class ImportProductsFromFileService
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

    public function import($filePath)
    {
        $rows = $this->getFileContentWithoutHeader($filePath);
        foreach ($rows as $row) {
            $address  = $row[5];
            $name     = $row[6];
            $merchant = $this->getMerchant($name, $address);

            $product = new Product(
                $row[0],
                $row[1],
                $row[2],
                new \DateTime($row[3]),
                new \DateTime($row[4]),
                Product::STATUS_AVAILABLE,
                $merchant
            );

            $this->productRepository->save($product);
        }

    }

    /**
     * @param string $name
     * @param string $address
     * @return Merchant
     */
    private function getMerchant($name, $address)
    {
        $merchant = $this->merchantRepository->findByAddress($address);
        if (!$merchant) {
            $merchant = new Merchant($name, $address);
            $this->merchantRepository->save($merchant);
        }

        return $merchant;
    }

    /**
     * @param string $filePath
     * @return array
     */
    private function getFileContentWithoutHeader($filePath)
    {
        $rows = [];
        $fp = fopen($filePath, "r");
        if ($fp !== FALSE) {
            while (!feof($fp)) {
                $data = fgetcsv($fp, 1000, "\t");
                $rows[] = $data;
            }
        }
        fclose($fp);

        return array_slice($rows, 1);
    }
}