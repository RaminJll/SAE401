<?php
// src/Repository/productsRepository.php
namespace Repository;

use Doctrine\ORM\EntityRepository;
use Entity\products;

class productsRepository extends EntityRepository{

    public function getAllProduits(){
        $queryBuilder = $this->getEntityManager()->createQueryBuilder()
        ->select('p')
        ->from(products::class, 'p');
        $query = $queryBuilder->getQuery();
        return $query->getResult();
    }

    public function getProductsByCategories($category){
        try {
            $queryBuilder = $this->getEntityManager()->createQueryBuilder();
            $query = $queryBuilder
                ->select('p')
                ->from(products::class, 'p')
                ->join('p.product_categorie', 'c')
                ->where('c.category_id = :category_id')
                ->setParameter(':category_id', $category)
                ->getQuery();
            
            return $query->getResult();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getProductsByBrands($brand){
        try {
            $queryBuilder = $this->getEntityManager()->createQueryBuilder();
            $query = $queryBuilder
                ->select('p')
                ->from(products::class, 'p')
                ->join('p.product_brand', 'b')
                ->where('b.brand_id = :brand_id')
                ->setParameter(':brand_id', $brand)
                ->getQuery();
            
            return $query->getResult();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getProductsByYears($year){
        try {
            $queryBuilder = $this->getEntityManager()->createQueryBuilder();
            $query = $queryBuilder
                ->select('p')
                ->from(products::class, 'p')
                ->where('p.model_year = :model_year')
                ->setParameter(':model_year', $year)
                ->getQuery();
            
            return $query->getResult();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getProductsByPrice($minPrice, $maxPrice){
        try {
            $queryBuilder = $this->getEntityManager()->createQueryBuilder();
            $query = $queryBuilder
                ->select('p')
                ->from(products::class, 'p')
                ->where('p.list_price >= :min_price')
                ->andWhere('p.list_price <= :max_price')
                ->setParameter('min_price', $minPrice)
                ->setParameter('max_price', $maxPrice)
                ->getQuery();
            
            return $query->getResult();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
}
?>