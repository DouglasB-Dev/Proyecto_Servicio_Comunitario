<?php
include ("../php/bd_conexion.php");
session_start();
if(!isset($_SESSION['id'])){
  header("Location: index.php");
}
$nombre = $_SESSION['nombre'];
$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";

// Obtener los registros de la página actual
$result = $conn->query($sql);

$contador_maquinas = mysqli_query($conn, "SELECT * FROM computadoras");
$num_filas_maquinas = mysqli_num_rows($contador_maquinas);

$contador_usuarios = mysqli_query($conn, "SELECT * FROM usuarios");
$num_filas_usuarios = mysqli_num_rows($contador_usuarios);

$contador_admins = mysqli_query($conn, "SELECT COUNT(*) FROM usuarios WHERE rol = 1;");
$numero_de_admins = mysqli_fetch_row($contador_admins)[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/inicio.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- BOOTSTRAP    -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <header id="principal">
    <nav class="container navbar navbar-expand-md">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Elías Calixto Pompa</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse navegador-separado" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav_option nav-link text-center active" aria-current="page" href="../inicio.php"><i class="bi bi-house-door"></i>  Principal</a>
                  <a class="nav_option nav-link text-center" href="../inicio.php#basededatos"><i class="bi bi-pc-display"></i>  Computadoras</a>
                  <?php if($rol == 1){?>
                    <a class="nav_option nav-link text-center" aria-current="page" href="admin/usuarios.php#bd_usuarios"> <i class="bi bi-person-circle"></i> Usuarios</a>
                  <?php } ?>
                  <a class="nav-link desconectar text-center" href="../php/logout.php"><i class="bi bi-box-arrow-left"></i>  Desconectar</a>
                </div>
              </div>
            </div>
        </nav>
    </div>
    <div class="contenedor_principal">
          <div class="bienvenido container text-center">
          <h2 style="color: white;">¡Bienvenido <?php echo $nombre ?>!</h2>
            <p>Estos son los registros en la base de datos:</p>
          </div>
          <div class="entidades">
                <h3 href="" class="computadoras"> <?php echo $num_filas_maquinas; ?></h3>
                <h3 href="" class="usuarios"> <?php echo $num_filas_usuarios; ?></h3>
                <h3 href="" class="administradores"><?php echo $numero_de_admins ?></h3>
            </div>
        </div>
    </div>
    <!-- Script para filtrar la tabla -->
    <script>
    $(document).ready(function(){
    $("#search-input").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#table-body tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
    });
    </script>
          <!-- BOOTSTRAP JS -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
          <script>
            $(document).ready(function() {
      $("#mi-tabla tr").each(function() {
        if ($(this).text().indexOf("No Funciona") >= 0) {
          $(this).addClass("bg-danger bg-gradient");
        }
        if ($(this).text().indexOf("Tiene fallos") >= 0) {
          $(this).addClass("bg-warning");
        }if ($(this).text().indexOf("SÍ") >= 0) {
          $(this).addClass("bg-success bg-gradient");
        }
      });
    });
          </script>
    </header>
    <main>
    <div class="container table-responsive text-center contenedor_bd">
                  <!-- Paginación -->
                  <nav aria-label="Paginación">
                    <ul class="pagination justify-content-center" id="pagination">
                    </ul>
                </nav>
            </div>
        
           <!-- Scripts de Bootstrap -->
           <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        
          <!-- Script para filtrar la tabla -->
          <script>
            $(document).ready(function(){
              $("#search-input").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#table-body tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });
            });
          </script>
                  <div class="mt-5 container table-responsive">
            <h2 style="color:red;" class="text-center">¡USTED ESTÁ MODIFICANDO UN REGISTRO!</h2>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header  bg-primary">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Formulario de Registro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                </div>
                </div>
            </div>
            </div>
            <!-- MODAL 2 -->
            <div class="modal fade" id="Modificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- ACA VA EL FORMULARIO -->
                    <H1>SEXO!!???</H1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send Pito</button>
                </div>
                </div>
            </div>
            </div>
            </div>
        
        
          <!-- Tabla -->
          <form method="POST" action="users_actualizar_formas.php" class="contenedor-form table-responsive" id="tabla_actualizar">
          <table id="mi-tabla" class="mt-3 container table table-hover table-striped table-responsive">
                <thead class="table-bordered bg-primary text-center" style="color: white;">
                  <tr>
                    <th>ID</th>
                    <th>Nombre del personal</th>
                    <th>Usuario</th>
                    <th>Clave</th>
                    <th>Rol</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="table-body">
                  <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr class="text-center">
                      <td> <input name="id"  type="text" value="<?php echo $row['id']; ?>"></td>
                      <td> <input name="nombre"  type="text" value="<?php echo $row['nombre']; ?>"></td>
                      <td> <input name="usuario"  type="text" value="<?php echo $row['usuario']; ?>"></td>
                      <td> <input name="clave"  type="text" value="<?php echo $row['clave']; ?>"></td>
                        <td class="form-group mt-3">
                          <select class="form-select form-control" aria-label="Default select example" id="rol" name="rol" >
                              <option selected disabled>Actual: <?php echo $row['rol']; ?></option>
                              <option value="1">(1)Administrador</option>
                              <option value="2">(2)Moderador</option>
                              <option value="3">(3)Usuario</option>
                           </select>
			                 </td>
                      <td> <input type="submit" value="confirmar"></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
          </form>
        </div>
    </main>
    <footer>
      <p>&copy U.E. "Elías Calixto Pompa" </p>
    </footer>


    <!-- BOOTSTAP JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>