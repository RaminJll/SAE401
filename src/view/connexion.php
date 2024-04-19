<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: #f8f9fa;
    }

    .form-container {
      max-width: 400px;
      padding: 20px;
      border: 1px solid #dee2e6;
      border-radius: 5px;
      background-color: #fff;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2 class="text-center mb-4">Login</h2>
    <form action="index.php?page=form" method="POST">
      <div class="form-group">
        <label for="username">Email</label>
        <input name="email" type="text" class="form-control" id="username" placeholder="Entrez votre nom d'utilisateur">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Login</button>
      <a href="index.php?page=accueilClient" class="text-center">Customer</a>
    </form>
    
  </div>

  <!-- Bootstrap JS (optionnel, seulement si vous utilisez des composants JavaScript de Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
