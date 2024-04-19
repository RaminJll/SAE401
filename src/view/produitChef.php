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
    .card {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <script type="text/javascript">
    $(document).ready(function(){
      // Fonction pour charger toutes les marques et remplir le sélecteur de marque
      function loadAllBrands() {
        $.ajax({
          url: "http://localhost/SAE_API/?action=getAllBrands",
          type: "GET",
          dataType: "json",
          success:function(data){
            console.log(data);
            var options = "";
            for (let i = 0; i < data.length; i++) {
              options += "<option value=\"" + data[i]["brand_id"] + "\">" + data[i]["brand_name"] + "</option>";
            }
            $("#marqueSelect").append(options);
          }
        });
      }

      // Fonction pour charger toutes les catégories et remplir le sélecteur de catégories
      function loadAllCategories() {
        $.ajax({
          url: "http://localhost/SAE_API/?action=getAllCategories",
          type: "GET",
          dataType: "json",
          success:function(data){
            console.log(data);
            var options = "";
            for (let i = 0; i < data.length; i++) {
              options += "<option value=\"" + data[i]["category_id"] + "\">" + data[i]["category_name"] + "</option>";
            }
            $("#categoriesSelect").append(options);
          }
        });
      }

      // Appel des fonctions pour charger les marques et les catégories
      loadAllBrands();
      loadAllCategories();

      // Fonction pour afficher les produits dans des cartes
      function displayProducts(data) {
        var output = "";
        $("#produit").empty();
        for (let i = 0; i < data.length; i++) {
          output += "<div class=\"card\">";
          output += "<div class=\"card-body\">";
          output += "<h5 class=\"card-title\">" + data[i]["product_name"] + "</h5>";
          output += "<p class=\"card-text\">Price :" + data[i]["list_price"] + "</p>";
          output += "</div></div>";
        }
        $("#produit").append(output);
      }

      // Écoute les changements sur le sélecteur de marque pour filtrer les produits
      $("#marqueSelect").change(function(){
        var selectedBrandId = $(this).val();
        $.ajax({
          url: "http://localhost/SAE_API/?action=getBrands&brand=" + selectedBrandId,
          type: "GET",
          dataType: "json",
          success:function(data){
            console.log(data);
            displayProducts(data);
          }
        });
      });

      // Écoute les changements sur le sélecteur de catégorie pour filtrer les produits
      $("#categoriesSelect").change(function(){
        var selectedCategoryId = $(this).val();
        $.ajax({
          url: "http://localhost/SAE_API/?action=getCategory&category=" + selectedCategoryId,
          type: "GET",
          dataType: "json",
          success:function(data){
            console.log(data);
            displayProducts(data);
          }
        });
      });

      // Écoute les changements sur le champ de texte d'année pour filtrer les produits
      $("#yearSelect").on('input', function(){
        var selectedYear = $(this).val();
        $.ajax({
          url: "http://localhost/SAE_API/?action=getYears&year=" + selectedYear,
          type: "GET",
          dataType: "json",
          success:function(data){
            console.log(data);
            displayProducts(data);
          }
        });
      });

      $("#prixMin, #prixMax").on('input', function(){
        var selectMin = $("#prixMin").val();
        var selectMax = $("#prixMax").val();
        $.ajax({
            url: "http://localhost/SAE_API/?action=getPrice&priceMin=" + selectMin +"&priceMax="+selectMax,
            type: "GET",
            dataType: "json",
            success:function(data){
            console.log(data);
            displayProducts(data);
            }
        });
        });


      // Requête AJAX pour charger tous les produits au chargement initial de la page
      $.ajax({
        url: "http://localhost/SAE_API/?action=getProducts",
        type: "GET",
        dataType: "json",
        success:function(data){
          console.log(data);
          displayProducts(data);
        }
      });
    });
  </script>

  <div class="container-fluid">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h3 class="mr-3">Bicycle</h3>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=accueilChef">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=produitChef">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=gestionChef">Product management</a>
            </li>
          </ul>
          <span class="navbar-text">
            <a href="index.php?page=accountChef">Account</a>
          </span>
        </div>
      </nav>
    </header>
    <div class="row mt-3">
      <main class="col-md-10 mx-auto">
        <h2>Product catalogue</h2>
        <!-- Sélecteur de marque pour filtrer les produits -->
        <select id="marqueSelect" class="form-control">
          <option value="">All Brands</option>
        </select>
        <!-- Sélecteur de catégorie pour filtrer les produits -->
        <select id="categoriesSelect" class="form-control">
          <option value="">All category</option>
        </select>
        <!-- Champ de texte pour filtrer les produits par année -->
        <input type="text" placeholder="Years" id="yearSelect" class="form-control">
        <input id="prixMin" type="number" placeholder="min price"/>
        <input id="prixMax" type="number" placeholder="max price"/>
        <div class="card-columns" id="produit">
          <!-- Les cartes de produits seront ajoutées ici dynamiquement -->
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
