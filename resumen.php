<?php
$connect = mysqli_connect("localhost","root","","tienda");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div class="container-lg">
    <br>
    <table class="table">
    <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="./index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./carrito.php">Carrito</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="./contacto.php">Contacto</a>
  </li>
  </ul>

</div>

<div class="container">

<div class="alert alert-success col-md-12" role="alert">
    <h4 class="alert-heading">Resultado:</h4>
    <?php

$datos=$_SESSION['cart'];	/*variable donde almaceno la información */

 
    print_r($datos);

    

?>
    
</div>
<div class="col-md-12">

</div>


</body>
</html>