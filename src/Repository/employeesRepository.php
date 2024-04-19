<?php
// src/Repository/employeesRepository.php
namespace Repository;

use Doctrine\ORM\EntityRepository;
use Entity\categories;
use Entity\brands;
use Entity\stores;
use Entity\products;
use Entity\stocks;

class employeesRepository extends EntityRepository
{
    public function createCategories($name)
    {
        try {
            $entityManager = $this->getEntityManager();
    
            $categorie = new categories;
            $categorie->setCategory_name($name);
    
            $entityManager->persist($categorie);
            $entityManager->flush();
            } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createBrands($name)
    {
        try {
            $entityManager = $this->getEntityManager();
    
            $brands = new brands;
            $brands->setBrand_name($name);
    
            $entityManager->persist($brands);
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createStore($name, $phone, $email, $street, $city, $state, $zip_code)
    {
        try {
            $entityManager = $this->getEntityManager();
    
            // Créez une nouvelle instance de l'entité brands
            $brands = new stores;
            $brands->setStore_name($name);
            $brands->setPhone($phone);
            $brands->setEmail($email);
            $brands->setStreet($street);
            $brands->setCity($city);
            $brands->setState($state);
            $brands->setZip_code($zip_code);
    
            $entityManager->persist($brands);
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createProducts($brand_id, $category_id, $product_name, $model_year, $list_price)
    {
        try {
            $entityManager = $this->getEntityManager();
            
            $brand = $entityManager->getRepository(brands::class)->find($brand_id);
            $category = $entityManager->getRepository(categories::class)->find($category_id);
            
            $product = new products;
            
            $product->setProduct_brand($brand);
            $product->setProduct_categorie($category);
            
            $product->setProduct_name($product_name);
            $product->setModel_year($model_year);
            $product->setList_price($list_price);
            
            $entityManager->persist($product);
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createStocks($store_id, $product_id, $quantity)
    {
        try {
            $entityManager = $this->getEntityManager();
            
            $store = $entityManager->getRepository(stores::class)->find($store_id);
            $product = $entityManager->getRepository(products::class)->find($product_id);
            
            $stocks = new stocks;
            
            $stocks->setStocks_stores($store);
            $stocks->setStock_products($product);
            $stocks->setQuantity($quantity);

            
            $entityManager->persist($stocks);
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateCategory($category_id, $name)
    {
        try {
            $entityManager = $this->getEntityManager();
    
            $category = $entityManager->getRepository(categories::class)->find($category_id);
    
            if ($category === null) {
                throw new \Exception("Catégorie non trouvée");
            }
    
            $category->setCategory_name($name);
    
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateBrand($brand_id, $name)
    {
        try {
            $entityManager = $this->getEntityManager();
    
            $brand = $entityManager->getRepository(brands::class)->find($brand_id);
    
            if ($brand === null) {
                throw new \Exception("Marque non trouvée");
            }
    
            $brand->setBrand_name($name);
    
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateStore($store_id, $name, $phone, $email, $street, $city, $state, $zip_code)
    {
        try {
            $entityManager = $this->getEntityManager();
    
            $store = $entityManager->getRepository(stores::class)->find($store_id);
    
            if ($store === null) {
                throw new \Exception("Magasin non trouvé");
            }
    
            $store->setStore_name($name);
            $store->setPhone($phone);
            $store->setEmail($email);
            $store->setStreet($street);
            $store->setCity($city);
            $store->setState($state);
            $store->setZip_code($zip_code);
    
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateProduct($product_id, $brand_id, $category_id, $product_name, $model_year, $list_price)
    {
        try {
            $entityManager = $this->getEntityManager();
            $product = $entityManager->getRepository(products::class)->find($product_id);
            if ($product === null) {
                throw new \Exception("Produit non trouvé");
            }
    
            $brand = $entityManager->getRepository(brands::class)->find($brand_id);
            $category = $entityManager->getRepository(categories::class)->find($category_id);
    
            $product->setProduct_brand($brand);
            $product->setProduct_categorie($category);
            $product->setProduct_name($product_name);
            $product->setModel_year($model_year);
            $product->setList_price($list_price);
    
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function updateStock($stock_id, $store_id, $product_id, $quantity)
    {
        try {
            $entityManager = $this->getEntityManager();
            $stock = $entityManager->getRepository(stocks::class)->find($stock_id);
            if ($stock === null) {
                throw new \Exception("Stock non trouvé");
            }
    
            $store = $entityManager->getRepository(stores::class)->find($store_id);
            $product = $entityManager->getRepository(products::class)->find($product_id);
    
            $stock->setStocks_stores($store);
            $stock->setStock_products($product);
            $stock->setQuantity($quantity);
    
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    
    public function deleteCategory($category_id)
    {
        try {
            $entityManager = $this->getEntityManager();
            $category = $entityManager->getRepository(categories::class)->find($category_id);
            if ($category === null) {
                throw new \Exception("Catégorie non trouvée");
            }
    
            $entityManager->remove($category);
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteBrand($brand_id)
    {
        try {
            $entityManager = $this->getEntityManager();
            $brand = $entityManager->getRepository(brands::class)->find($brand_id);
            if ($brand === null) {
                throw new \Exception("Marque non trouvée");
            }
    
            $entityManager->remove($brand);
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteStore($store_id)
    {
        try {
            $entityManager = $this->getEntityManager();
            $store = $entityManager->getRepository(stores::class)->find($store_id);
            if ($store === null) {
                throw new \Exception("Magasin non trouvé");
            }
    
            $entityManager->remove($store);
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteProduct($product_id)
    {
        try {
            $entityManager = $this->getEntityManager();
            $product = $entityManager->getRepository(products::class)->find($product_id);
            if ($product === null) {
                throw new \Exception("Produit non trouvé");
            }
    
            $entityManager->remove($product);
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteStock($stock_id)
    {
        try {
            $entityManager = $this->getEntityManager();
            $stock = $entityManager->getRepository(stocks::class)->find($stock_id);
            if ($stock === null) {
                throw new \Exception("Stock non trouvé");
            }
    
            $entityManager->remove($stock);
            $entityManager->flush();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function connexionIT(string $email, string $password) {
        $qb = $this->createQueryBuilder('e');
        $qb->andWhere($qb->expr()->eq('e.employee_email', ':email'))
           ->andWhere($qb->expr()->eq('e.employee_password', ':password'))
           ->andWhere($qb->expr()->in('e.employee_role', ['it']))
           ->setParameter('email', $email)
           ->setParameter('password', $password);

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function connexionEmployee(string $email, string $password) {
        $qb = $this->createQueryBuilder('e');
        $qb->andWhere($qb->expr()->eq('e.employee_email', ':email'))
           ->andWhere($qb->expr()->eq('e.employee_password', ':password'))
           ->andWhere($qb->expr()->in('e.employee_role', ['employee']))
           ->setParameter('email', $email)
           ->setParameter('password', $password);

        return $qb->getQuery()->getOneOrNullResult();
    }
    
    public function connexionChef(string $email, string $password) {
        $qb = $this->createQueryBuilder('e');
        $qb->andWhere($qb->expr()->eq('e.employee_email', ':email'))
           ->andWhere($qb->expr()->eq('e.employee_password', ':password'))
           ->andWhere($qb->expr()->in('e.employee_role', ['chief']))
           ->setParameter('email', $email)
           ->setParameter('password', $password);

        return $qb->getQuery()->getOneOrNullResult();
    }
    
}


?>