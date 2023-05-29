<?php

session_start();

$connect = mysqli_connect("localhost","root","","tienda");

if(isset($_POST['add_to_cart'])) {

  echo "Ver en carrito";

  if(isset($_GET['../carrito.php'])) {

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

    }else{

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
  <title>Tienda Online</title>
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
    <a class="nav-link" href="./contacto.php">Contacto</a>
  </li>
  </ul>

</div>
    <div class="container-lg">
      <div class="row">
        <div class="col-md-12">

        <h2 class="text-center">Tienda de vestidos</h2>

        <div class="col-md-12">
          <div class="row">

        <?php

        $query = "SELECT * FROM productos";
        $result = mysqli_query($connect, $query);


        while ($row = mysqli_fetch_array($result)) {?>

        <div class="col-md-4">
        <form method="post" action="index.php?Codigo=<?=$row['Codigo'] ?>">
          <img src="img/<?= $row['Imagen'] ?>" style="height: 150px;">
          <h6 class="text-center"><?= $row['Nombre']; ?></h6>
          <h6 class="text-center">$<?= number_format($row['Precio'],2) ?></h6>
          <input type="hidden" name="Nombre" value="<?= $row['Nombre'] ?>">
          <input type="hidden" name="Precio" value="<?= $row['Precio'] ?>">
          <input type="number" name="quantity" value="1" class="form-control">
          <input type="submit" name="add_to_cart" class="btn btn-dark btn-block my-2" value="Add To Cart">
      
        </form>
        </div>

        <?php }

        ?>

          </div>
        </div>

        </div>

        <div class="col-md-12">
          <h2 class="text-center">Articulos</h2>

          <div class="col-md-12">


          <?php

        

            $output="";

            $output .= "
              <table class='table table-biordered table-striped'>
                <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                </tr>
            
                ";

            if (!empty($_SESSION['cart'])) {

              foreach ($_SESSION['cart'] as $key => $value) {

                $output .= "
                <tr>
                  <td>".$value['Codigo']."</td>
                  <td>".$value['Nombre']."</td>
                  <td>".$value['Precio']."</td>
                </tr>
                
                
                ";

            }

            $output .= "
              <tr>
              <td colspan='0'></td>
              <td></b> Ver en carrito</b></td>
              <td>
                <a href='./carrito.php'>
                <button class='btn btn-dark'>ir</button>
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
    </div>
  </div>

</body>
</html>