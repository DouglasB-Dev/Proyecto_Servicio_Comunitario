<?php
include ("php/bd_conexion.php");
session_start();

if(!isset($_SESSION['id'])){
  header("Location: index.php");
}
$nombre = $_SESSION['nombre'];
$rol = $_SESSION['rol'];
// Obtener el número total de registros en la tabla
$sql_count = "SELECT COUNT(*) AS count FROM computadoras";
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_records = $row_count['count'];

// Definir el número de registros por página
$records_per_page = 5;

// Calcular el número total de páginas
$total_pages = ceil($total_records / $records_per_page);

// Obtener la página actual
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcular el índice del primer registro en la página actual
$offset = ($page - 1) * $records_per_page;

// Obtener los registros de la página actual
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM computadoras WHERE `Nombre Equipo` LIKE '%$search%' ORDER BY SerialPC LIMIT $offset, $records_per_page";
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
    <link rel="stylesheet" href="css/inicio.css">
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
                  <a class="nav_option nav-link text-center" aria-current="page" href="#"><i class="bi bi-house-door"></i>  Principal</a>
                  <a class="nav_option nav-link text-center" href="#basededatos"><i class="bi bi-pc-display"></i>  Computadoras</a>
                  <?php if($rol == 1){?>
                    <a class="nav_option nav-link text-center" aria-current="page" href="admin/usuarios.php#bd_usuarios"> <i class="bi bi-person-circle"></i> Usuarios</a>
                  <?php } ?>

                  <a class="nav-link desconectar text-center" href="php/logout.php"><i class="bi bi-box-arrow-left"></i>  Desconectar</a>
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
            <h2 style="">Computadoras Calixto Pompa</h2>
            <div class="row buscador_bd">
              <div class="col-12 col-md-4 mb-3">
                <input type="text" id="search-input" class="form-control" placeholder="Buscar...">
              </div>
              <?php if($rol == 1 || $rol == 2){ ?>
              <button type="button" class="btn btn-primary col-10 col-md-3 botones_db p-3 m-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="bi bi-plus-circle"></i>  Registrar</button>
              <?php } ?>
              <!--    <button type="button" class="btn btn-primary col-3 botones_db" data-bs-toggle="modal" data-bs-target="#Modificar" data-bs-whatever="@fat"><i class="bi bi-pencil-square"></i>  Modificar</button> -->


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
                <option value="Control de estudio">Control de estudio</option>
                <option value="Dirección">Dirección</option>
                <option value="Seccional">Seccional</option>
                <option value="Deposito">Deposito</option>
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
          <div class="contenedor-form table-responsive" id="basededatos">
          <table id="mi-tabla" class="mt-3 container table table-hover table-striped table-responsive">
                <thead class="table-bordered bg-primary text-center" style="color: white;">
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
                    <?php if($rol == 1 || $rol == 2){ ?>
                    <th>Editar/Eliminar</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody id="table-body">
                  <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr class="text-center">
                      <td><?php echo $row['SerialPC']; ?></td>
                      <td><?php echo $row['Nombre Equipo']; ?></td>
                      <td><?php echo $row['Ubicación']; ?></td>
                      <td><?php echo $row['Usuario']; ?></td>
                      <td><?php echo $row['Clave']; ?></td>
                      <td><?php echo $row['SO']; ?></td>
                      <td><?php echo $row['Especificaciones']; ?></td>
                      <td><?php echo $row['Operativa']; ?></td>
                      <td><?php echo $row['Office']; ?></td>
                      <td><?php echo $row['Navegador']; ?></td>
                      <?php if($rol == 1 || $rol == 2){?>
                      <td class="text-center">
                        <a href="php/bd_actualizar.php?id=<?php echo $row['ID_computadoras'];?>"><i class="bi bi-pencil-square" style="color: blue;"></i></a>
                        <a  class="eliminar_bd" href="php/bd_eliminar.php?id=<?php echo $row['ID_computadoras'];?>"><i class="bi bi-trash3" style="color:red;"></i></a>
                      </td>
                      <?php } ?>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
          </div>
            <!-- Paginación -->
            <nav aria-label="Paginación">
              <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                  <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                    <a class="page-link" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?page=<?php echo $i; ?>&search=<?php echo $search; ?>"><?php echo $i; ?></a>
                  </li>
                <?php } ?>
              </ul>
            </nav>
            
          </div>

        </div>
    </main>
    <footer>
      <p>&copy U.E. "Elías Calixto Pompa" </p>
    </footer>


    <!-- JS ELIMINAR -->
    <script src="js/alerta_bd.js"></script>
    <!-- BOOTSTAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>