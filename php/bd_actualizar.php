<?php
include ("bd_conexion.php");
session_start();
if(!isset($_SESSION['id'])){
  header("Location: index.php");
}
$nombre = $_SESSION['nombre'];
$id_pc = $_GET['id'];
$sql = "SELECT * FROM computadoras WHERE ID_computadoras = '$id_pc'";

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
                  <a class="nav-link desconectar text-center" href="logout.php"><i class="bi bi-box-arrow-left"></i>  Desconectar</a>
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
                <div class="modal-body">
                <div class="container">
		
		<form action="php/bd_computadoras.php" method="POST">
			<div class="form-group">
				<label for="serial">Serial:</label>
				<input type="text" class="form-control" id="serial" name="serial">
			</div>
			<div class="form-group mt-3">
				<label for="nombre">Nombre del Equipo:</label>
				<input type="text" class="form-control" id="nombre" name="nombre">
			</div>
			<div class="form-group mt-3">
				<label for="ubicacion">Ubicación:</label>
				<select class="form-select form-control" aria-label="Default select example" id="ubicacion" name="ubicacion" >
                <option selected disabled>Seleccione una opción</option>
                <option value="1">Control de estudio</option>
                <option value="2">Dirección</option>
                <option value="3">Seccional</option>
                </select>
			</div>
			<div class="form-group mt-3">
				<label for="usuario">Usuario:</label>
				<input type="text" class="form-control" id="usuario" name="usuario">
			</div>
			<div class="form-group mt-3">
				<label for="clave">Clave:</label>
				<input type="password" class="form-control" id="clave" name="clave">
			</div>
			<div class="form-group mt-3">
				<label for="so">S.O:</label>
				<input type="text" class="form-control" id="so" name="so">
			</div>
			<div class="form-group mt-3">
				<label for="especificaciones">Especificaciones:</label>
				<textarea class="form-control" id="especificaciones" name="especificaciones"></textarea>
			</div>
      <div class="operativa_check mt-3">
        <h6>¿Está Operativa?</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="operativa" id="check_oper1" value="Sí">
            <label class="form-check-label" for="check_oper1">Sí</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="operativa" id="check_oper2" value="No">
            <label class="form-check-label" for="check_oper2">No</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="operativa" id="check_oper3" value="Desconocido">
            <label class="form-check-label" for="check_oper3">Desconocido</label>
          </div>
        </div>
        <div class="office_check mt-3">
          <h6>¿Posee Office?</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="office" id="check_off1" value="Sí">
            <label class="form-check-label" for="check_off1">Sí</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="office" id="check_off2" value="No">
            <label class="form-check-label" for="check_off2">No</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="office" id="check_off3" value="Desconocido">
            <label class="form-check-label" for="check_off3">Desconocido</label>
          </div>
        </div>
        <div class="office_check mt-3">
          <h6>¿Posee Navegador Web?</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="navegador" id="check_nav1" value="Sí">
            <label class="form-check-label" for="check_nav1">Sí</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="navegador" id="check_nav2" value="No">
            <label class="form-check-label" for="check_nav2">No</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="navegador" id="check_nav3" value="Desconocido">
            <label class="form-check-label" for="check_nav3">Desconocido</label>
          </div>
        </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-primary" value="Registrar">
                </div>
		</form>
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
          <form class="p-5 contenedor-form table-responsive" id="basededatos" action="bd_actualizar_formas.php" method="POST">
          <table id="mi-tabla" class="container table table-hover table-striped table-responsive">
                <thead class="table-bordered bg-primary" style="color: white;">
                  <tr>
                    <th>Serial</th>
                    <th>Nombre Equipo</th>
                    <th>Ubicación</th>
                    <th>Usuario</th>
                    <th>Clave</th>
                    <th>S.O</th>
                    <th>Especificaciones</th>
                    <th>Operativa</th>
                    <th>Office</th>
                    <th>Navegador</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="table-body">
                  <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr class="">
                      <input name="ID_computadoras" type="hidden" value="<?php echo $row['ID_computadoras']; ?>">
                      <td><input name="serial" type="text" value="<?php echo $row['SerialPC']; ?>"></td>
                      <td><input name="nombre" type="text" value="<?php echo $row['Nombre Equipo']; ?>"></td>
                      <td><input name="ubicacion" type="text" value="<?php echo $row['Ubicación']; ?>"></td>
                      <td><input name="usuario" type="text" value="<?php echo $row['Usuario']; ?>"></td>
                      <td><input name="clave" type="text" value="<?php echo $row['Clave']; ?>"></td>
                      <td><input name="so" type="text" value="<?php echo $row['SO']; ?>"></td>
                      <td><input name="especificaciones" type="text" value="<?php echo $row['Especificaciones']; ?>"></td>
                      <td><input name="operativa" type="text" value="<?php echo $row['Operativa']; ?>"></td>
                      <td><input name="office" type="text" value="<?php echo $row['Office']; ?>"></td>
                      <td><input name="navegador" type="text" value="<?php echo $row['Navegador']; ?>"></td>
                      <td> <input type="submit" value="Confirmar"> </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
          </form>
          </div>
        </div>
    </main>
    <footer>
      <p>&copy U.E. "Elías Calixto Pompa" </p>
    </footer>


    <!-- BOOTSTAP JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>