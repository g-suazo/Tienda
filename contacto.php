<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
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

    <h1 class="h3"background-color="red">Contactanos</h1><br>

    <div class="col-md-12">
      
    <br>
      <form action="procesoguardar.php" method="POST" autocomplete="off" enctype="multipart/form-data">
          
          <div class="mb-3">
          <label for="nombre" class="form-label">Nombre:</label>
          <input type="text" class="form-control" name ="nombre" id="nombre" value=""> 
          </div>

          <div class="mb-3">
          <label for="phone" class="form-label">Teléfono:</label>
          <input type="number" class="form-control" name ="phone" id="phone" value=""> 
          </div>

          <div class="mb-3">
          <label for="correo" class="form-label">Correo:</label>
          <input type="email" class="form-control" name ="correo" id="correo" value=""> 
          </div>

          <div class="mb-3">
          <label for="detalle" class="form-label"> Detalla tu Consulta</label>
          <textarea class="form-control" id="detalle" name ="detalle" rows="3"></textarea>
          </div>

          <button type = "submit" class="btn btn-dark" name ="Consultar" value =""> Enviar Consulta </button>
      </form> <br><br>
      <a href="data.php">Data</a>
      </div>

    </div>
</body>
</html>


