<?php

namespace AppBundle\Repository\Doctrine;

use AppBundle\Entity\Repository\ProductRepository;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class ProductRepositoryImpl extends EntityRepository implements ProductRepository
{
    private $em;

    public function __construct(EntityManager $em, $entityClassName)
    {
        $this->em = $em;
        parent::__construct($em, new ClassMetadata($entityClassName));
    }

    public function countByMonth()
    {
        return $this->em->getConnection()->query(
            'SELECT COUNT(1) as total, DATE_FORMAT(initDate, "%M") as month FROM products p GROUP BY MONTH(p.initDate)'
        )->fetchAll();
    }

    public function countByMerchant()
    {
        return $this->em->getConnection()->query(
            'SELECT COUNT(p.id) as total, m.name
             FROM products p
             LEFT JOIN merchants m on (p.merchantId = m.id)
             GROUP BY m.id, DATE_FORMAT(initDate, "%c")'
        )->fetchAll();
    }

    /**
     * @param Product $product
     */
    public function save(Product $product)
    {
        $this->em->persist($product);
        $this->em->flush();
    }
}
