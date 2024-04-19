<?php
// src/Entity/brands.php
namespace Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Entity\employees;
use Entity\products;
use Repository\employeesRepository;
use Repository\brandsRepository;
use JsonSerializable;

/**
 * @ORM\Entity(repositoryClass="Repository\employeesRepository")
 * @ORM\Entity(repositoryClass="Repository\brandsRepository")
 * @ORM\Table(name="brands")
 */
class brands implements JsonSerializable{
    /** @var int */
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $brand_id;

    /** @var string */
    /**
     * @ORM\Column(type="string")
     */
    private $brand_name;

    /** @var \Doctrine\Common\Collections\Collection */
    /**
     * @ORM\OneToMany(targetEntity=products::class, mappedBy="product_brand")
     */
    private Collection $brand_product;

    public function __construct() {
        $this->brand_product = new ArrayCollection();
    }

    /**
     * Get brand_product.
     * 
     * @return Collection|products[]
     */
    public function getBrand_product(){
        return $this->brand_product;
    }

    /**
     * Get brand_id.
     * 
     * @return int
     */
    public function getBrand_id(){
        return $this->brand_id;
    }

    /**
     * Get brand_name.
     * 
     * @return string
     */
    public function getBrand_name(){
        return $this->brand_name;
    }

    /**
     * Set brand_id.
     * 
     * @param int $brand_id
     * 
     * @return brands
     */
    public function setBrand_id($brand_id){
        $this->brand_id=$brand_id;
        return $this;
    }

    /**
     * Set brand_name.
     * 
     * @param string $brand_name
     * 
     * @return brands
     */
    public function setBrand_name($brand_name){
        $this->brand_name=$brand_name;
        return $this;
    }

    public function jsonSerialize() {
        return [
            'brand_id' => $this->brand_id,
            'brand_name' => $this->brand_name,
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