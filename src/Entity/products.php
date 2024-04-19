<?php
// src/Entity/products.php
namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Entity\brands;
use Entity\categories;
use Entity\stocks;
use Repository\ProductsRepository;
use Repository\employeeRepository;
use JsonSerializable;

/**
 * @ORM\Entity(repositoryClass="Repository\productsRepository")
 * @ORM\Table(name="products")
 */
class products implements JsonSerializable{
    /** @var int */
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $product_id;

    /** @var string */
    /**
     * @ORM\Column(type="string")
     */
    private $product_name;

    /**
     * @ORM\ManyToOne(targetEntity=brands::class, inversedBy="brand_product", cascade={"persist"})
     * @ORM\JoinColumn(name="brand_id", referencedColumnName="brand_id")
     */
    private brands $product_brand;

    /**
     * @ORM\ManyToOne(targetEntity=categories::class, inversedBy="categorie_product", cascade={"persist"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
     */
    private categories $product_categorie;

    /** @var int */
    /**
     * @ORM\Column(type="smallint")
     */
    private $model_year;

    /** @var float */
    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $list_price;

    /** @var \Doctrine\Common\Collections\Collection */
    /**
     * @ORM\OneToMany(targetEntity=stocks::class, mappedBy="stock_products")
     */
    private Collection $product_stock;

    public function __construct() {
        $this->product_stock = new ArrayCollection();
    }

    /**
     * Get product_categorie.
     * 
     * @return categories
     */
    public function getProduct_categorie(){
        return $this->product_categorie;
    }

    /**
     * Set product_categorie.
     * 
     * @param categories $product_categorie
     * 
     * @return products
     */
    public function setProduct_categorie($product_categorie){
        $this->product_categorie=$product_categorie;
        return $this;
    }

    /**
     * Get product_brand.
     * 
     * @return brands
     */
    public function getProduct_brand(){
        return $this->product_brand;
    }

    /**
     * Set product_brand.
     * 
     * @param brands $product_brand
     * 
     * @return products
     */
    public function setProduct_brand($product_brand){
        $this->product_brand=$product_brand;
        return $this;
    }

    /**
     * Get product_stock.
     * 
     * @return Collection|stocks[]
     */
    public function getProduct_stock(){
        return $this->product_stock;
    }


    /**
     * Get product_id.
     * 
     * @return int
     */
    public function getProduct_id(){
        return $this->product_id;
    }

    /**
     * Get product_name.
     * 
     * @return string
     */
    public function getProduct_name(){
        return $this->product_name;
    }

    /**
     * Get model_year.
     * 
     * @return int
     */
    public function getModel_year(){
        return $this->model_year;
    }

    /**
     * Get list_price.
     * 
     * @return float
     */
    public function getList_price(){
        return $this->list_price;
    }

    /**
     * Set product_id.
     * 
     * @param int $product_id
     * 
     * @return products
     */
    public function setProduct_id($product_id){
        $this->product_id=$product_id;
        return $this;
    }

    /**
     * Set product_name.
     * 
     * @param string $product_name
     * 
     * @return products
     */
    public function setProduct_name($product_name){
        $this->product_name=$product_name;
        return $this;
    }

    /**
     * Set model_year.
     * 
     * @param int $model_year
     * 
     * @return Product
     */
    public function setModel_year(int $model_year) {
        $this->model_year = $model_year;
        return $this;
    }

    /**
     * Set list_price.
     * 
     * @param float $list_price
     * 
     * @return Product
     */
    public function setList_price(float $list_price) {
        $this->list_price = $list_price;
        return $this;
    }

    public function jsonSerialize() {
        return [
            'product_id' => $this->product_id,
            'product_name' => $this->product_name,
            'product_brand' => $this->product_brand->getBrand_id(),
            'product_category' => $this->product_categorie->getCategory_id(),
            'model_year' => $this->model_year,
            'list_price' => $this->list_price,
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