<!doctype html>
<html lang="sk">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/style.css">
    <style>
    </style>
 </head>
  <body>
  <?php if(isset($_SESSION["flash_error"])): ?>
  <div class="alert alert-danger" role="alert">
    <?php 
    echo $_SESSION["flash_error"];
    unset($_SESSION["flash_error"]); 
    ?>
</div>
<?php endif;?>

    <form class="container register" method="POST">
          <h1 class="h1-register">Register</h1>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" >
            </div>
            <div class="preklik-button">
              <button type="submit" class="btn btn-primary">Register</button>
              <p class="preklik">Mate uz ucet? <a href="login">Login</a></p>
            </div>
        </form>  





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>