<?php
// src/Entity/stocks.php
namespace Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JsonSerializable;

/**
 * @ORM\Entity(repositoryClass="Repository\employeesRepository")
 * @ORM\Table(name="stocks")
 */
class stocks implements JsonSerializable{
    /** @var int */
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $stock_id;

    /**
     * @ORM\ManyToOne(targetEntity=stores::class, inversedBy="store_stock", cascade={"persist"})
     * @ORM\JoinColumn(name="store_id", referencedColumnName="store_id")
     */
    private $stocks_stores;

    /**
     * @ORM\ManyToOne(targetEntity=products::class, inversedBy="product_stock", cascade={"persist"})
     * @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     */
    private $stock_products;

    /** @var int */
    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * Get stock_products.
     * 
     * @return products
     */
    public function getStock_products(){
        return $this->stock_products;
    }

    /**
     * Set stock_products.
     * 
     * @param products $stock_products
     * 
     * @return stocks
     */
    public function setStock_products($stock_products){
        $this->stock_products=$stock_products;
        return $this;
    }

    /**
     * Get stocks_stores.
     * 
     * @return stores
     */
    public function getStocks_stores(){
        return $this->stocks_stores;
    }

    /**
     * Set stocks_stores.
     * 
     * @param stores $stocks_stores
     * 
     * @return stocks
     */
    public function setStocks_stores($stocks_stores){
        $this->stocks_stores=$stocks_stores;
        return $this;
    }

    /**
     * Get stock_id.
     * 
     * @return int
     */
    public function getStock_id(){
        return $this->stock_id;
    }

    /**
     * Get quantity.
     * 
     * @return int
     */
    public function getQuantity(){
        return $this->quantity;
    }

    /**
     * Set stock_id.
     * 
     * @param int $stock_id
     * 
     * @return stocks
     */
    public function setStock_id($stock_id){
        $this->stock_id=$stock_id;
        return $this;
    }

    /**
     * Set quantity.
     * 
     * @param int $quantity
     * 
     * @return stocks
     */
    public function setQuantity($quantity){
        $this->quantity=$quantity;
        return $this;
    }

    public function jsonSerialize() {
        return [
            'stock_id' => $this->stock_id,
            'stocks_stores' => $this->stocks_stores,
            'stock_products' => $this->stock_products,
            'quantity' => $this->quantity,
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