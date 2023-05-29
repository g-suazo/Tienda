<?php

session_start();
$connect = mysqli_connect("localhost","root","","tienda");

if(isset($_POST['add_to_cart'])) {

  if(isset($_SESSION['cart'])) {

      $session_array_Codigo = array_column($_SESSION['cart'], "Codigo");


      if(!in_array($_GET['Codigo'], $session_array_Codigo)) {
        
        $session_array = array(
          "Codigo" => $_GET['Codigo'],
          "Nombre" => $_POST['Nombre'],
          "Precio" => $_POST['Precio'],
          "quantity" => $_POST['quantity'],
        );
      
        $_SESSION['cart'][] = $session_array;

      }
      

    }else {

    $session_array = array(
    "Codigo" => $_GET['Codigo'],
    "Nombre" => $_POST['Nombre'],
    "Precio" => $_POST['Precio'],
    "quantity" => $_POST['quantity'],
  );

  $_SESSION['cart'][] = $session_array;

  }
  
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
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


<div class="col-md-12">
          <h2 class="text-center">Carrito</h2>

          <?php

            $total = 0;

            $output="";

            $output .= "
              <table class='table table-biordered table-striped'>
                <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Precio total</th>
                </tr>
            
                ";

            if (!empty($_SESSION['cart'])) {

              foreach ($_SESSION['cart'] as $key => $value) {

                $output .= "
                <tr>
                  <td>".$value['Codigo']."</td>
                  <td>".$value['Nombre']."</td>
                  <td>".$value['Precio']."</td>
                  <td>".$value['quantity']."</td>
                  <td>$".number_format($value['Precio'] * $value['quantity'],2) ."</td>
                </tr>
                
                
                ";

                $total = $total + $value['quantity'] * $value['Precio'];

            }

            $output .= "
              <tr>
              <td colspan='3'></td>
              <td></b> Precio Total </b></td>
              <td>".number_format($total,2)."</td>
              <td>
                <a href='carrito.php?action=clearall'>
                <button class='btn btn-dark'>Vaciar Carrito</button>
                </a><br><br>
                <a href='./resumen.php'>
                <button class='btn btn-warning' style='display:block'>Completar</button>
                </a>
              </td>
              </tr>
            ";


          }
           
          echo $output;
          ?>

        </div>
      </div>
    </div>
  </div>

  <?php

  if (isset($_GET['action'])) {

    if ($_GET['action'] == "clearall") {
      unset($_SESSION['cart']);
    }

 /*   if ($_GET['action'] == "remove") {

      foreach ($_SESSION['cart'] as $key => $value) {

        if ($value['Codigo'] == $_GET['Codigo']) {
          unset($_SESSION['cart'][$key]);
      }
    }
  }*/

}

  ?>
    
</body>

</html>