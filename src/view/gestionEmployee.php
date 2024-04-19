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

    .form-container {
      max-width: 400px;
      margin: 0 auto;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
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
                <a class="nav-link" href="index.php?page=accueilEmployee">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=produitEmployee">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=gestionEmployee">Product management</a>
            </li>
            </ul>
            <span class="navbar-text">
            <a href="index.php?page=accountEmployee">Account</a>
            </span>
        </div>
    </nav>
    </header>

    <div class="row mt-3">
      <main class="col-md-9 m-auto">
        <div class="form-container mb-3">
          <h2 class="text-center mb-4">New Category</h2>
          <form action="index.php?action=postCategory&access=e8f1997c763" method="POST">
            <div class="form-group">
              <label for="exampleInput1">category name</label>
              <input name="name" type="text" class="form-control" id="exampleInput1">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
        <div class="form-container mb-3">
          <h2 class="text-center mb-4">New Brands</h2>
          <form action="index.php?action=postBrands&access=e8f1997c763" method="POST">
            <div class="form-group">
              <label for="exampleInput1">brands name</label>
              <input name="name" type="text" class="form-control" id="exampleInput1">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
        <div class="form-container mb-3">
          <h2 class="text-center mb-4">New Stores</h2>
          <form action="index.php?action=postStores&access=e8f1997c763" method="POST">
            <div class="form-group">
              <label for="exampleInput1">store name</label>
              <input name="name" type="text" class="form-control">
              <label for="exampleInput1">phone</label>
              <input name="phone" type="text" class="form-control">
              <label for="exampleInput1">email</label>
              <input name="email" type="text" class="form-control">
              <label for="exampleInput1">street</label>
              <input name="street" type="text" class="form-control">
              <label for="exampleInput1">city</label>
              <input name="city" type="text" class="form-control">
              <label for="exampleInput1">state</label>
              <input name="state" type="text" class="form-control">
              <label for="exampleInput1">zip_code</label>
              <input name="zip_code" type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
        <div class="form-container mb-3">
          <h2 class="text-center mb-4">New Product</h2>
          <form action="index.php?action=postProducts&access=e8f1997c763" method="POST">
            <div class="form-group">
              <label for="exampleInput1">brand id</label>
              <input name="brand" type="text" class="form-control">
              <label for="exampleInput1">category id</label>
              <input name="category" type="text" class="form-control">
              <label for="exampleInput1">product</label>
              <input name="product" type="text" class="form-control">
              <label for="exampleInput1">model</label>
              <input name="model" type="text" class="form-control">
              <label for="exampleInput1">price</label>
              <input name="price" type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
        <div class="form-container mb-3">
          <h2 class="text-center mb-4">New Stock</h2>
          <form action="index.php?action=postStocks&access=e8f1997c763" method="POST">
            <div class="form-group">
              <label for="exampleInput1">store_id</label>
              <input name="store_id" type="text" class="form-control">
              <label for="exampleInput1">product_id</label>
              <input name="product_id" type="text" class="form-control">
              <label for="exampleInput1">quantity</label>
              <input name="quantity" type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
        <div class="form-container mb-3">
            <h2 class="text-center mb-4">Update Category</h2>
            <form action="index.php?action=putCategorie&access=e8f1997c763" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="exampleInput1">category_id</label>
                    <input name="category_id" type="text" class="form-control">
                    <label for="exampleInput1">name</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ubdate</button>
            </form>
        </div>
        <div class="form-container mb-3">
            <h2 class="text-center mb-4">Update Brand</h2>
            <form action="index.php?action=putBrand&access=e8f1997c763" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="exampleInput1">brand_id</label>
                    <input name="brand_id" type="text" class="form-control">
                    <label for="exampleInput1">name</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ubdate</button>
            </form>
        </div>
        <div class="form-container mb-3">
            <h2 class="text-center mb-4">Update Store</h2>
            <form action="index.php?action=putStore&access=e8f1997c763" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="exampleInput1">store_id</label>
                    <input name="store_id" type="text" class="form-control">
                    <label for="exampleInput1">name</label>
                    <input name="name" type="text" class="form-control">
                    <label for="exampleInput1">phone</label>
                    <input name="phone" type="text" class="form-control">
                    <label for="exampleInput1">email</label>
                    <input name="email" type="text" class="form-control">
                    <label for="exampleInput1">street</label>
                    <input name="email" type="text" class="form-control">
                    <label for="exampleInput1">city</label>
                    <input name="city" type="text" class="form-control">
                    <label for="exampleInput1">state</label>
                    <input name="state" type="text" class="form-control">
                    <label for="exampleInput1">zip_code</label>
                    <input name="zip_code" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ubdate</button>
            </form>
        </div>
        <div class="form-container mb-3">
            <h2 class="text-center mb-4">Update Product</h2>
            <form action="index.php?action=putProduct&access=e8f1997c763" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="exampleInput1">product_id</label>
                    <input name="product_id" type="text" class="form-control">
                    <label for="exampleInput1">brand_id</label>
                    <input name="brand_id" type="text" class="form-control">
                    <label for="exampleInput1">category_id</label>
                    <input name="category_id" type="text" class="form-control">
                    <label for="exampleInput1">product_name</label>
                    <input name="product_name" type="text" class="form-control">
                    <label for="exampleInput1">model_year</label>
                    <input name="model_year" type="text" class="form-control">
                    <label for="exampleInput1">list_price</label>
                    <input name="list_price" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ubdate</button>
            </form>
        </div>
        <div class="form-container mb-3">
            <h2 class="text-center mb-4">Update Stock</h2>
            <form action="index.php?action=putStock&access=e8f1997c763" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="exampleInput1">stock_id</label>
                    <input name="stock_id" type="text" class="form-control">
                    <label for="exampleInput1">store_id</label>
                    <input name="store_id" type="text" class="form-control">
                    <label for="exampleInput1">product_id</label>
                    <input name="product_id" type="text" class="form-control">
                    <label for="exampleInput1">quantity</label>
                    <input name="quantity" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ubdate</button>
            </form>
        </div>
        <div class="form-container mb-3">
            <h2 class="text-center mb-4">Delete Category</h2>
            <form action="index.php?action=deleteCategory&access=e8f1997c763" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <div class="form-group">
                    <label for="category_id">category_id</label>
                    <input name="category_id" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-danger btn-block">Delete</button>
            </form>
        </div>
        <div class="form-container mb-3">
            <h2 class="text-center mb-4">Delete Brand</h2>
            <form action="index.php?action=deleteBrand&access=e8f1997c763" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <div class="form-group">
                    <label for="brand_id">brand_id</label>
                    <input name="brand_id" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-danger btn-block">Delete</button>
            </form>
        </div>
        <div class="form-container mb-3">
            <h2 class="text-center mb-4">Delete Store</h2>
            <form action="index.php?action=deleteStore&access=e8f1997c763" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <div class="form-group">
                    <label for="store_id">store_id</label>
                    <input name="store_id" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-danger btn-block">Delete</button>
            </form>
        </div>
        <div class="form-container mb-3">
            <h2 class="text-center mb-4">Delete Product</h2>
            <form action="index.php?action=deleteProduct&access=e8f1997c763" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <div class="form-group">
                    <label for="product_id">product_id</label>
                    <input name="product_id" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-danger btn-block">Delete</button>
            </form>
        </div>
        <div class="form-container mb-3">
            <h2 class="text-center mb-4">Delete Stock</h2>
            <form action="index.php?action=deleteStock&access=e8f1997c763" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <div class="form-group">
                    <label for="stock_id">stock_id</label>
                    <input name="stock_id" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-danger btn-block">Delete</button>
            </form>
        </div>
      </main>
    </div>

    <footer class="row bg-dark text-light py-3">
      <div class="col-12 text-center">
        <a href="index.php?page=mentionLegal">legal notice</a>
      </div>
    </footer>
  </div>
</body>
</html>
