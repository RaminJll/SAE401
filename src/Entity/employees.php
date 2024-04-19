<?php
// src/Entity/employees.php
namespace Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Entity\categories;
use Entity\stores;
use Entity\brands;
use Repository\employeesRepository;
use JsonSerializable;

/**
 * @ORM\Entity(repositoryClass="Repository\employeesRepository")
 * @ORM\Table(name="employees")
 */
class employees implements JsonSerializable{
    /** @var int */
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $employee_id;

    /**
     * @ORM\ManyToOne(targetEntity=stores::class, inversedBy="store_employee", cascade={"persist"})
     * @ORM\JoinColumn(name="store_id", referencedColumnName="store_id")
     */
    private stores $employee_store;

    /** @var string */
    /**
     * @ORM\Column(type="string")
     */
    private $employee_name;

    /** @var string */
    /**
     * @ORM\Column(type="string")
     */
    private $employee_email;

    /** @var string */
    /**
     * @ORM\Column(type="string")
     */
    private $employee_password;

    /** @var string */
    /**
     * @ORM\Column(type="string")
     */
    private $employee_role;

    /**
     * Get employee_id.
     * 
     * @return int
     */
    public function getEmployee_id(){
        return $this->employee_id;
    }

    /**
     * Get employee_store.
     * 
     * @return stores
     */
    public function getEmployee_store(){
        return $this->employee_store;
    }

    /**
     * Set employee_store.
     * 
     * @param stores $employee_store
     * 
     * @return employees
     */
    public function setEmployee_store($employee_store){
        $this->employee_store=$employee_store;
        return $this;
    }

    /**
     * Get employee_name.
     * 
     * @return string
     */
    public function getEmployee_name(){
        return $this->employee_name;
    }

    /**
     * Get employee_email.
     * 
     * @return string
     */
    public function getEmployee_email(){
        return $this->employee_email;
    }

    /**
     * Get employee_password.
     * 
     * @return string
     */
    public function getEmployee_password(){
        return $this->employee_password;
    }

    /**
     * Get employee_role.
     * 
     * @return string
     */
    public function getEmployee_role(){
        return $this->employee_role;
    }

    /**
     * Set employee_id.
     * 
     * @param int $employee_id
     * 
     * @return employees
     */
    public function setEmployee_id($employee_id){
        $this->employee_id=$employee_id;
        return $this;
    }

    /**
     * Set employee_name.
     * 
     * @param string $employee_name
     * 
     * @return employees
     */
    public function setEmployee_name($employee_name){
        $this->employee_name=$employee_name;
        return $this;
    }

    /**
     * Set employee_email.
     * 
     * @param string $employee_email
     * 
     * @return employees
     */
    public function setEmployee_email($employee_email){
        $this->employee_email=$employee_email;
        return $this;
    }

    /**
     * Set employee_password.
     * 
     * @param string $employee_password
     * 
     * @return employees
     */
    public function setEmployee_password($employee_password){
        $this->employee_password=$employee_password;
        return $this;
    }

    /**
     * Set employee_role.
     * 
     * @param string $employee_role
     * 
     * @return employees
     */
    public function setEmployee_role($employee_role){
        $this->employee_role=$employee_role;
        return $this;
    }

    public function jsonSerialize() {
        return [
            'employee_id' => $this->employee_id,
            'employee_store' => $this->employee_store->getStore_id(),
            'employee_name' => $this->employee_name,
            'employee_email' => $this->employee_email,
            'employee_password' => $this->employee_password,
            'employee_role' => $this->employee_role,
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