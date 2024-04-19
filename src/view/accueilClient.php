<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ma Page Web</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <style>
    footer {
      background-color: #333;
      color: #fff;
      padding: 20px 0;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h3 class="mr-3">Bicycle</h3>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=accueilClient">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=produitClient">Product</a>
            </li>
            </ul>
        </div>
    </nav>
    </header>

    <div class="row mt-3">
    <main class="col-md-9">
      <h2>Customer Home</h2>
        <h1>BikeShop API Documentation</h1>

        <h2>Authentication:</h2>
        <p>All API requests require authentication using an API key. Include your API key in the request headers as follows:</p>
        <pre><code>Authorization: e8f1997c763</code></pre>

        <h3>GET / action=getProducts</h3>
        <p>Description: Retrieve a list of all bikes in our store.</p>
        <p>Parameters: None</p>
        <p>Response: An array of bike objects.</p>

        <h3>GET /action=getCategory&category=</h3>
        <p>Description: Retrieve details of a specific bike by category.</p>
        <p>Parameters: id (integer)</p>
        <p>Response: Details of the specified bike in JSON format.</p>

        <h3>GET /action=getYears&year=</h3>
        <p>Description: Retrieve details of a specific bike by year.</p>
        <p>Parameters: year (integer)</p>
        <p>Response: Details of the specified bike in JSON format.</p>

        <h3>GET /action=getBrands&brand=</h3>
        <p>Description: Retrieve details of a specific bike by brand.</p>
        <p>Parameters: id (integer)</p>
        <p>Response: Details of the specified bike in JSON format.</p>

        <h3>GET /action=getPrice&priceMin=&priceMax=</h3>
        <p>Description: Retrieve details of a specific bike by price.</p>
        <p>Parameters: id (integer)</p>
        <p>Parameters: id (integer)</p>
        <p>Response: Details of the specified bike in JSON format.</p>

        <h3>POST /action=postCategory&name</h3>
        <p>Description: Add a new brand to our inventory.</p>
        <p>Parameters: brand_name</p>

        <h3>POST /action=postBrands&name</h3>
        <p>Description: Add a new category to our inventory.</p>
        <p>Parameters: category_name</p>

        <h3>POST /action=postStores</h3>
        <p>Description: Add a new store to our inventory.</p>
        <p>Parameters: name, phone, email, street, city, state, zip_code</p>

        <h3>POST /action=postProducts</h3>
        <p>Description: Add a new product to our inventory.</p>
        <p>Parameters: brand, category, product, model, price</p>

        <h3>POST /action=postStocks</h3>
        <p>Description: Add stock of a product to a store.</p>
        <p>Parameters: store_id, product_id, quantity</p>

        <h3>PUT /action=putCategorie</h3>
        <p>Description: Update category name.</p>
        <p>Parameters: category_id, name</p>

        <h3>PUT /action=putBrand</h3>
        <p>Description: Update brand name.</p>
        <p>Parameters: brand_id, name</p>

        <h3>PUT /action=putStore</h3>
        <p>Description: Update store details.</p>
        <p>Parameters: store_id, name, phone, email, street, city, state, zip_code</p>

        <h3>PUT /action=putProduct</h3>
        <p>Description: Update product details.</p>
        <p>Parameters: product_id, brand_id, category_id, product_name, model_year, list_price</p>

        <h3>PUT /action=putStock</h3>
        <p>Description: Update stock quantity of a product in a store.</p>
        <p>Parameters: stock_id, store_id, product_id, quantity</p>

        <h3>DELETE /action=deleteCategory</h3>
        <p>Description: Delete a category from inventory.</p>
        <p>Parameters: category_id</p>

        <h3>DELETE /action=deleteBrand</h3>
        <p>Description: Delete a brand from inventory.</p>
        <p>Parameters: brand_id</p>

        <h3>DELETE /action=deleteStore</h3>
        <p>Description: Delete a store from inventory.</p>
        <p>Parameters: store_id</p>

        <h3>DELETE /action=deleteProduct</h3>
        <p>Description: Delete a product from inventory.</p>
        <p>Parameters: product_id</p>

        <h3>DELETE /action=deleteStock</h3>
        <p>Description: Delete stock of a product from a store.</p>
        <p>Parameters: stock_id</p>

        <h2>Error Handling:</h2>
        <p>The API returns appropriate HTTP status codes for different types of errors. Error responses include a message field providing details about the error.</p>

        <p>That's it! You're all set to start using our BikeShop API. If you have any questions or need assistance, feel free to reach out to our support team. Happy biking! 🚲</p>
    </main>
    </div>

    <footer class="row bg-dark text-light py-3">
      <div class="col-12 text-center">
        <a href="index.php?page=mentionLegal">legal notice</a>
      </div>
    </footer>
</body>
</html>
