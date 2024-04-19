<?php
// src/Repository/brandsRepository.php
namespace Repository;

use Doctrine\ORM\EntityRepository;
use Entity\brands;

class brandsRepository extends EntityRepository{
    
    public function getAllBrands(){
        try {
            $queryBuilder = $this->getEntityManager()->createQueryBuilder();
            $query = $queryBuilder
                ->select('p')
                ->from(brands::class, 'p')
                
                ->getQuery();
            
            return $query->getResult();
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

?>