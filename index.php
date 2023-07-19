<?php
include("php/bd_conexion.php");
session_start();

  if($_POST){
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $sql = "SELECT id,nombre,usuario,clave,rol FROM usuarios WHERE usuario='$usuario'";
    $resultado = $conn->query($sql);
    $num = $resultado->num_rows;

    if($num>0){
      $row = $resultado->fetch_assoc();
      $clave_bd = $row['clave'];

      $pass_c = $clave_bd;

      if($clave == $pass_c){
        $_SESSION['id'] = $row['id'];
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['rol'] = $row['rol'];
        $_SESSION['nombre'] = $row['nombre'];

        header("Location: inicio.php");
        
      } else{
        echo "La contraseña no coincide.";
      }
    }else{
      echo"Usuario no enontrado.";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Inicio de Sesión | U.E. Elías Calixto Pompa </title>
</head>
<body>
    <main class="login container">
            <form class="row col-9 col-sm-8 col-md-6 col-xl-4 bg-white" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="formulario text-center">
                <input required="required" type="text" class="form-control" id="usuario_login" name="usuario" aria-describedby="emailHelp">
                <label for="exampleInputEmail1" class="form-label">Nombre de Usuario</label>
                </div>
                <div class="formulario">
                  <input  required="required" type="password" class="form-control" id="clave" name="clave">
                  <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                </div>
                <input type="submit" class="btn btn-primary col-5" value="Ingresar">
              </form>
    </main>
    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>