<?php
// src/Repository/categoriesRepository.php
namespace Repository;

use Doctrine\ORM\EntityRepository;
use Entity\categories;

class categoriesRepository extends EntityRepository{
    
    public function getAllcategories(){
        try {
            $queryBuilder = $this->getEntityManager()->createQueryBuilder();
            $query = $queryBuilder
                ->select('c')
                ->from(categories::class, 'c')
                
                ->getQuery();
            
            return $query->getResult();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

?>