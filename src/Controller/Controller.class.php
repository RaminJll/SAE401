<?php
// src/Controller/Controller.php

namespace Controller;

use Entity\products;
use Entity\employees;
use Entity\categories;
use Entity\brands;
use Repository\productsRepository;
use Repository\employeesRepository;
use view\accueil;

class Controller {
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    private function checkAccessKey() {
        $providedKey = isset($_REQUEST["access"]) ? $_REQUEST["access"] : null;
        $allowedKey = "e8f1997c763";
        if ($providedKey !== $allowedKey) {
            header("HTTP/1.1 401 Unauthorized");
            exit(json_encode(array("message" => "Accès non autorisé")));
        }
    }

    public function main(){
        if (isset($_GET["action"]) && !empty($_GET["action"])) {
            $this->handleRequest($_GET["action"]);
            return;
        }
    
        if (isset($_GET["page"]) && !empty($_GET["page"])) {
            if ($_GET["page"] == "accueilClient") {
                require_once(__DIR__ . "/../view/accueilClient.php");
                return;
            }
            elseif ($_GET["page"] == "accueilEmployee") {
                include_once(__DIR__ . "/../view/accueilEmployee.php");
                return;
            }
            elseif ($_GET["page"] == "accueilChef") {
                include_once(__DIR__ . "/../view/accueilChef.php");
                return;
            }
            elseif ($_GET["page"] == "accueilIt") {
                include_once(__DIR__ . "/../view/accueilIt.php");
                return;
            }
            elseif ($_GET["page"] == "produitClient") {
                include_once(__DIR__ . "/../view/produitClient.php");
                return;
            }
            elseif ($_GET["page"] == "produitIt") {
                include_once(__DIR__ . "/../view/produitIt.php");
                return;
            }
            elseif ($_GET["page"] == "produitChef") {
                include_once(__DIR__ . "/../view/produitChef.php");
                return;
            }
            elseif ($_GET["page"] == "produitEmployee") {
                include_once(__DIR__ . "/../view/produitEmployee.php");
                return;
            }
            elseif ($_GET["page"] == "accountEmployee") {
                include_once(__DIR__ . "/../view/accountEmployee.php");
                return;
            }
            elseif ($_GET["page"] == "accountIt") {
                include_once(__DIR__ . "/../view/produitIt.php");
                return;
            }
            elseif ($_GET["page"] == "accountChef") {
                include_once(__DIR__ . "/../view/produitChef.php");
                return;
            }
            elseif ($_GET["page"]== "gestionEmployee") {
                include_once(__DIR__ . "/../view/gestionEmployee.php");
                return;
            }
            elseif ($_GET["page"]== "gestionIt") {
                include_once(__DIR__ . "/../view/gestionIt.php");
                return;
            }
            elseif ($_GET["page"]== "gestionChef") {
                include_once(__DIR__ . "/../view/gestionChef.php");
                return;
            }
            elseif ($_GET["page"]=="connexion") {
                include_once(__DIR__ . "/../view/connexion.php");
                return;
            }
            elseif ($_GET["page"]=="mentionLegal") {
                include_once(__DIR__ . "/../view/mentionLegal.php");
                return;
            }
            elseif ($_GET["page"]=="form") {
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    if(isset($_POST['email']) && isset($_POST['password'])){
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        $employeesRepository = $this->entityManager->getRepository(employees::class);

                        $It = $employeesRepository->connexionIT($email, $password);
                        $employee = $employeesRepository->connexionEmployee($email, $password);
                        $chef = $employeesRepository->connexionChef($email, $password);

                        if($It){
                            $_SESSION["account"]=$It;
                            include_once(__DIR__ . "/../view/accueilIt.php");
                            return;
                        }
                        if ($employee) {
                            $_SESSION["account"]=$employee;
                            include_once(__DIR__ . "/../view/accueilEmployee.php");
                            return;
                        }
                        if ($chef) {
                            $_SESSION["account"]=$chef;
                            include_once(__DIR__ . "/../view/accueilChef.php");
                            return;
                        }
                    }
                } else {
                    include_once(__DIR__ . "/../view/connexion.php");
                    return;
                }
            }
        }
        else {
            include_once(__DIR__ . "/../view/connexion.php");
            return;
        }
    
        header("HTTP/1.0 404 Not Found");
    }

    public function handleRequest($action){

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,X-Requested-With");
        $request_method=$_SERVER["REQUEST_METHOD"];

        switch ($request_method) {
            case 'GET':
                    switch ($action) {
                        case 'getProducts':
                            $productsRepository= $this->entityManager->getRepository(products::class); 
                            $allProducts= $productsRepository->getAllProduits(); 
                            if ($allProducts!=null) {
                                echo json_encode($allProducts);
                            }
                            else{
                                $response=array("status" => 0,"status_message" =>'Products not found.');
                                echo json_encode($response);
                            }
                            break;
                            case 'getCategory':
                                $value=$_REQUEST["category"];
                                $productsRepository= $this->entityManager->getRepository(products::class);
                                $categoryProduct= $productsRepository->getProductsByCategories($value);
                                if ($categoryProduct!=null) {
                                    echo json_encode($categoryProduct);
                                }
                                else{
                                    $response=array("status" => 0,"status_message" =>'Products by category not found.');
                                    echo json_encode($response);
                                }
                            break;
                            case 'getAllBrands':
                                $productsRepository= $this->entityManager->getRepository(brands::class); 
                                $allBrands= $productsRepository->getAllBrands(); 
                                if ($allBrands!=null) {
                                    echo json_encode($allBrands);
                                }
                                else{
                                    $response=array("status" => 0,"status_message" =>'Products not found.');
                                    echo json_encode($response);
                                }
                            break;
                            case 'getAllCategories':
                                $productsRepository= $this->entityManager->getRepository(categories::class); 
                                $allBrands= $productsRepository->getAllcategories(); 
                                if ($allBrands!=null) {
                                    echo json_encode($allBrands);
                                }
                                else{
                                    $response=array("status" => 0,"status_message" =>'Products not found.');
                                    echo json_encode($response);
                                }
                            break;
                            case 'getBrands':
                                $value=$_REQUEST["brand"];
                                $productsRepository= $this->entityManager->getRepository(products::class);
                                $brandProduct= $productsRepository->getProductsByBrands($value);
                                if ($brandProduct!=null) {
                                    echo json_encode($brandProduct);
                                }
                                else{
                                    $response=array("status" => 0,"status_message" =>'Products by brand not found.');
                                    echo json_encode($response);
                                }
                            break;
                            case 'getYears':
                                $value=$_REQUEST["year"];
                                $productsRepository= $this->entityManager->getRepository(products::class);
                                $yearsProduct= $productsRepository->getProductsByYears($value);
                                if ($yearsProduct!=null) {
                                    echo json_encode($yearsProduct);
                                }
                                else{
                                    $response=array("status" => 0,"status_message" =>'Products by brand not found.');
                                    echo json_encode($response);
                                }
                            break;
                            case 'getPrice':
                                $value1=$_REQUEST["priceMin"];
                                $value2=$_REQUEST["priceMax"];
                                $productsRepository= $this->entityManager->getRepository(products::class);
                                $priceProduct= $productsRepository->getProductsByPrice($value1, $value2);
                                if ($priceProduct!=null) {
                                    echo json_encode($priceProduct);
                                }
                                else{
                                    $response=array("status" => 0,"status_message" =>'Products by brand not found.');
                                    echo json_encode($response);
                                }
                            break;
                    }
                break;
            
            case 'POST':
                $this->checkAccessKey();

                    switch ($action) {
                        case 'postCategory':
                            $value = $_REQUEST["name"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($value != null) {
                                $newCategorie = $employeesRepository->createCategories($value);
                            }
                        break;
                        case 'postBrands':
                            $value = $_REQUEST["name"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($value != null) {
                                $newBrands = $employeesRepository->createBrands($value);
                            }
                        break;
                        case 'postStores':
                            $value1 = $_REQUEST["name"];
                            $value2 = $_REQUEST["phone"];
                            $value3 = $_REQUEST["email"];
                            $value4 = $_REQUEST["street"];
                            $value5 = $_REQUEST["city"];
                            $value6 = $_REQUEST["state"];
                            $value7 = $_REQUEST["zip_code"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($value1 != null && $value2 != null && $value3 != null && $value4 != null && $value5 != null && $value6 != null && $value7 != null) {
                                $newStore = $employeesRepository->createStore($value1, $value2, $value3, $value4, $value5, $value6, $value7);
                            }
                        break;
                        case 'postProducts':
                            $value1 = $_REQUEST["brand"];
                            $value2 = $_REQUEST["category"];
                            $value3 = $_REQUEST["product"];
                            $value4 = $_REQUEST["model"];
                            $value5 = $_REQUEST["price"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($value1 != null && $value2 != null && $value3 != null && $value4 != null && $value5 != null) {
                                $newProduct = $employeesRepository->createProducts($value1, $value2, $value3, $value4, $value5);
                            }
                        break;
                        case 'postStocks':
                            $value1 = $_REQUEST["store_id"];
                            $value2 = $_REQUEST["product_id"];
                            $value3 = $_REQUEST["quantity"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($value1 != null && $value2 != null && $value3 != null) {
                                $newStock = $employeesRepository->createStocks($value1, $value2, $value3);
                            }
                        break;
                    }
            
            case 'PUT':
                if (isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
                $this->checkAccessKey();

                    switch ($action) {
                        case 'putCategorie':
                            $category_id = $_REQUEST["category_id"];
                            $new_name = $_REQUEST["name"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($category_id != null && $new_name != null) {
                                $employeesRepository->updateCategory($category_id, $new_name);
                            }
                        break;
                        case 'putBrand':
                            $brand_id = $_REQUEST["brand_id"];
                            $new_name = $_REQUEST["name"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($brand_id != null && $new_name != null) {
                                $employeesRepository->updateBrand($brand_id, $new_name);
                            }
                        break;
                        case 'putStore':
                            $store_id = $_REQUEST["store_id"];
                            $name = $_REQUEST["name"];
                            $phone = $_REQUEST["phone"];
                            $email = $_REQUEST["email"];
                            $street = $_REQUEST["street"];
                            $city = $_REQUEST["city"];
                            $state = $_REQUEST["state"];
                            $zip_code = $_REQUEST["zip_code"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($store_id != null && $name != null && $phone != null && $email != null && $street != null && $city != null && $state != null && $zip_code != null) {
                                $employeesRepository->updateStore($store_id, $name, $phone, $email, $street, $city, $state, $zip_code);
                            }
                        break;
                        case 'putProduct':
                            $product_id = $_REQUEST["product_id"];
                            $brand_id = $_REQUEST["brand_id"];
                            $category_id = $_REQUEST["category_id"];
                            $product_name = $_REQUEST["product_name"];
                            $model_year = $_REQUEST["model_year"];
                            $list_price = $_REQUEST["list_price"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($product_id != null && $brand_id != null && $category_id != null && $product_name != null && $model_year != null && $list_price != null) {
                                $employeesRepository->updateProduct($product_id, $brand_id, $category_id, $product_name, $model_year, $list_price);
                            }
                        break;
                        case 'putStock':
                            $stock_id = $_REQUEST["stock_id"];
                            $store_id = $_REQUEST["store_id"];
                            $product_id = $_REQUEST["product_id"];
                            $quantity = $_REQUEST["quantity"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($stock_id != null && $store_id != null && $product_id != null && $quantity != null) {
                                $employeesRepository->updateStock($stock_id, $store_id, $product_id, $quantity);
                            }
                        break;
                    }}
            break;
            case 'DELETE':
                if (isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
                $this->checkAccessKey();

                    switch ($action) {
                        case 'deleteCategory':
                            $category_id = $_REQUEST["category_id"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($category_id != null) {
                                $employeesRepository->deleteCategory($category_id);
                            }
                        break;
                        case 'deleteBrand':
                            $brand_id = $_REQUEST["brand_id"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($brand_id != null) {
                                $employeesRepository->deleteBrand($brand_id);
                            }
                        break;
                        case 'deleteStore':
                            $store_id = $_REQUEST["store_id"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($store_id != null) {
                                $employeesRepository->deleteStore($store_id);
                            }
                        break;
                        case 'deleteProduct':
                            $product_id = $_REQUEST["product_id"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($product_id != null) {
                                $employeesRepository->deleteProduct($product_id);
                            }
                        break;
                        case 'deleteStock':
                            $stock_id = $_REQUEST["stock_id"];
                            $employeesRepository = $this->entityManager->getRepository(employees::class);
                            if ($stock_id != null) {
                                $employeesRepository->deleteStock($stock_id);
                            }
                        break;
                    }}
                break;

            default:
                header("HTTP/1.0 405 Method Not Allowed");
            break;
        }
    }
    
}
?>
