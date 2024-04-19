<?php
// src/Entity/stores.php
namespace Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Entity\employees;
use Repository\employeesRepository;
use JsonSerializable;

/**
 * @ORM\Entity(repositoryClass="Repository\employeesRepository")
 * @ORM\Table(name="stores")
 */
class stores implements JsonSerializable{
    /** @var int */
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $store_id;

    /** @var string */
    /**
     * @ORM\Column(type="string")
     */
    private $store_name;

    /** @var string */
    /**
     * @ORM\Column(type="string")
     */
    private $phone;

    /** @var string */
    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /** @var string */
    /**
     * @ORM\Column(type="string")
     */
    private $street;

    /** @var string */
    /**
     * @ORM\Column(type="string")
     */
    private $city;

    /** @var string */
    /**
     * @ORM\Column(type="string")
     */
    private $state;

    /** @var string */
    /**
     * @ORM\Column(type="string")
     */
    private $zip_code;

    /** @var \Doctrine\Common\Collections\Collection */
    /**
     * @ORM\OneToMany(targetEntity=stocks::class, mappedBy="stocks_stores")
     */
    private Collection $store_stock;

    /** @var \Doctrine\Common\Collections\Collection */
    /**
     * @ORM\OneToMany(targetEntity=employees::class, mappedBy="employee_store")
     */
    private Collection $store_employee;

    public function __construct() {
        $this->store_stock = new ArrayCollection();
        $this->store_employee = new ArrayCollection();
    }

    /**
     * Get store_id.
     * 
     * @return int
     */
    public function getStore_id(){
        return $this->store_id;
    }

    /**
     * Get store_employee.
     * 
     * @return Collection|employees[]
     */
    public function getStore_employee(){
        return $this->store_employee;
    }

    /**
     * Get store_stock.
     * 
     * @return Collection|stocks[]
     */
    public function getStore_stock(){
        return $this->store_stock;
    }

    /**
     * Get store_name.
     * 
     * @return string
     */
    public function getStore_name(){
        return $this->store_name;
    }

    /**
     * Get phone.
     * 
     * @return string
     */
    public function getPhone(){
        return $this->phone;
    }

    /**
     * Get email.
     * 
     * @return string
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * Get street.
     * 
     * @return string
     */
    public function getStreet(){
        return $this->street;
    }

    /**
     * Get city.
     * 
     * @return string
     */
    public function getCity(){
        return $this->city;
    }

    /**
     * Get state.
     * 
     * @return string
     */
    public function getState(){
        return $this->state;
    }

    /**
     * Get zip_code.
     * 
     * @return string
     */
    public function getZip_code(){
        return $this->zip_code;
    }

    /**
     * Set store_id.
     * 
     * @param int $store_id
     * 
     * @return stores
     */
    public function setStore_id($store_id){
        $this->store_id=$store_id;
        return $this;
    }

    /**
     * Set store_name.
     * 
     * @param string $store_name
     * 
     * @return stores
     */
    public function setStore_name($store_name){
        $this->store_name=$store_name;
        return $this;
    }

    /**
     * Set phone.
     * 
     * @param string $phone
     * 
     * @return stores
     */
    public function setPhone($phone){
        $this->phone=$phone;
        return $this;
    }

    /**
     * Set email.
     * 
     * @param string $email
     * 
     * @return stores
     */
    public function setEmail($email){
        $this->email=$email;
        return $this;
    }

    /**
     * Set street.
     * 
     * @param string $street
     * 
     * @return stores
     */
    public function setStreet($street){
        $this->street=$street;
        return $this;
    }

    /**
     * Set city.
     * 
     * @param string $city
     * 
     * @return stores
     */
    public function setCity($city){
        $this->city=$city;
        return $this;
    }

    /**
     * Set state.
     * 
     * @param string $state
     * 
     * @return stores
     */
    public function setState($state){
        $this->state=$state;
        return $this;
    }

    /**
     * Set zip_code.
     * 
     * @param string $zip_code
     * 
     * @return stores
     */
    public function setZip_code($zip_code){
        $this->zip_code=$zip_code;
        return $this;
    }

    public function jsonSerialize() {
        return [
            'store_id' => $this->store_id,
            'store_name' => $this->store_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'street' => $this->street,
            'city' => $this->city,
            'state' => $this->state,
            'zip_code' => $this->zip_code,
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