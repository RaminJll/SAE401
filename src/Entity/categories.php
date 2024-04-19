<?php
// src/Entity/categories.php
namespace Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Repository\ProductsRepository;
use Repository\emploeyeesRepository;
use Repository\categoriesRepository;
use Entity\products;
use JsonSerializable;

/**
 * @ORM\Entity(repositoryClass="Repository\categoriesRepository")
 * @ORM\Table(name="categories")
 */
class categories implements JsonSerializable{
    /** @var int */
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $category_id;

    /** @var string */
    /** 
     * @ORM\Column(type="string")
    */
    private $category_name;
    
    /** @var \Doctrine\Common\Collections\Collection */
    /**
     * @ORM\OneToMany(targetEntity=products::class, mappedBy="product_categorie")
     */
    private Collection $categorie_product;

    public function __construct() {
        $this->categorie_product = new ArrayCollection();
    }

    /**
     * Get categorie_product.
     * 
     * @return Collection|products[]
     */
    public function getCategorie_product(){
        return $this->categorie_product;
    }

    /**
     * Get category_id.
     * 
     * @return int
     */
    public function getCategory_id(){
        return $this->category_id;
    }

    /**
     * Get category_name.
     * 
     * @return string
     */
    public function getCategory_name(){
        return $this->category_name;
    }

    /**
     * Set category_id.
     * 
     * @param int $category_id
     * 
     * @return categories
     */
    public function setCategory_id($category_id){
        $this->category_id=$category_id;
        return $this;
    }

    /**
     * Set category_name.
     * 
     * @param string $category_name
     * 
     * @return categories
     */
    public function setCategory_name($category_name){
        $this->category_name=$category_name;
        return $this;
    }

    public function jsonSerialize() {
        return [
            'category_id' => $this->category_id,
            'category_name' => $this->category_name,
        ];
    }

    public function __toString() {
        $result = '';
        foreach($this as $k => $v) {
            $result .= "$v";
            if ($v === null) {
                $result = "un des champs est vide";
            }
        }
        return $result;
    }
}

?>