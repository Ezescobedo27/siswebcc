<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../../login.php");
    exit();
}
include("../../bd.php"); // We need to add the db
// Obtener los estatus de la tabla tbl_estatus
$query = $conexion->query("SELECT * FROM tbl_estatus");
$estatus = $query->fetchAll(PDO::FETCH_ASSOC);

// Obtener los usuarios de la tabla tbl_usuarios
$queryUsuarios = $conexion->query("SELECT * FROM tbl_usuarios");
$usuarios = $queryUsuarios->fetchAll(PDO::FETCH_ASSOC);

// Obtener los grados_grupo de la tabla tbl_grados_grupos
$queryGradosGrupos = $conexion->query("SELECT * FROM tbl_grados_grupos");
$gradosGrupos = $queryGradosGrupos->fetchAll(PDO::FETCH_ASSOC);

// Obtener los equipos de computo de la tabla tbl_tipo_equipo_computo 
$queryEquiposComputo = $conexion->query("SELECT * FROM tbl_equipos_computo");
$equiposComputo = $queryEquiposComputo->fetchAll(PDO::FETCH_ASSOC);

$id = $imagen = $nombrecompleto = $puesto = $twiter = $facebook = $linkedin = '';

if (isset($_GET['txtID'])) { // If the key 'txtID' exists in the $_GET array
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_historial_prestamos` WHERE ID=:ID"); // Prepare the query
    $sentencia->bindParam(':ID', $_GET['txtID']);
    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);
    $id = $registro['ID'];
    $s_asunto = $registro['s_asunto'];
    $s_descripcion = $registro['s_descripcion'];
    $nombre = $registro['nombre'];
    $marca = $registro['marca'];
    $modelo = $registro['modelo'];
    $grado_grupo = $registro['grado_grupo'];
    $fecha_prestamo = $registro['fecha_prestamo'];
    $fecha_devolucion = $registro['fecha_devolucion'];
    $estado_servicio = $registro['estado'];
    $equipo_computo = $registro['equipo_computo'];
    $d_fecha_creacion = $registro['d_fecha_creacion'];

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['txtID'];
    $s_asunto = $_POST['asunto'];
    $s_descripcion = $_POST['descripcion'];
    $nombre = $_POST['nombre'];
    $estado_servicio = $_POST['estado'];
    $grado_grupo = $_POST['grado_grupo'];
    $equipo_computo = $_POST['equipo_computo'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_devolucion = $_POST['fecha_devolucion'];
    $d_fecha_creacion = $_POST['d_fecha_creacion'];
    
    $sentencia = $conexion->prepare("UPDATE `tbl_historial_prestamos` SET `s_asunto` = '$s_asunto', `s_descripcion` = '$s_descripcion', `d_fecha_creacion` = '$d_fecha_creacion', `nombre` = '$nombre', `grado_grupo` = '$grado_grupo', `fecha_prestamo` = '$fecha', `fecha_devolucion` = '$fecha_devolucion', `estado` = '$estatus', `equipo_computo` = '$equipo_computo' WHERE `tbl_historial_prestamos`.`ID` = '$ID';");
    $sentencia->bindParam(':s_asunto', $s_asunto);
    $sentencia->bindParam(':s_descripcion', $s_descripcion);
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':estado', $estado_servicio);
    $sentencia->bindParam(':grado_grupo', $grado_grupo);
    $sentencia->bindParam(':equipo_computo', $equipo_computo);
    $sentencia->bindParam(':fecha_prestamo', $fecha_prestamo);
    $sentencia->bindParam(':fecha_devolucion', $fecha_devolucion);
    $sentencia->bindParam(':ID', $id);
    $sentencia->execute();

    header("Location: index.php"); 
}

include("../../templates/header.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Administrador compudc</title>
    <!-- Meta -->
    <?php include("./templates/etiquetas-meta.php"); ?>
    <!-- Icono -->
    <link rel="shortcut icon" href="img/favicon.svg" type="image/x-icon">
    <!-- Rel Bootstrap -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <?php include("./templates/librerias-head.php"); ?>

    <link rel="stylesheet" href="../../../css/style.min.css">

    <style>
        .card {
            margin: 1rem;
        }

        .card h2 {
            padding: 1rem;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar Inicio -->
    <?php include("./templates/header.php"); ?>
    <!-- Navbar Fin -->

    <!-- Página Encabezado Inicio -->
    <div class="mb-5 container-fluid page-header position-relative">

        <div class="pt-1 d-flex flex-column align-items-center justify-content-center pt-lg-5" style="min-height: 200px">
            <h1 class="mt-0 mb-3 text-white display-4 mt-lg-5 text-uppercase">Editar prestamo</h1>
            <div class="d-inline-flex mb-lg-5">

            </div>
        </div>

    </div>
    <!-- Página Encabezado Fin -->

    <div class="card flex-grow-1">

        <!-- Listar Equipos -->


        <div class="card">
            <h2 class="card-header">Formulario Edición prestamo</h2>
            <div class="card-body">
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <label for="asunto" class="form-label">Asunto</label>
                        <input type="text" class="form-control" name="asunto" id="asunto" aria-describedby="helpId" placeholder="Asunto" required="true" value="<?php echo $s_asunto; ?>" />
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción" value="<?php echo $s_descripcion; ?>" />
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del solicitante</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Descripción" required="true" value="<?php echo $nombre; ?>" />
                    </div>

                    <div class="mb-3">
                        <label for="grado_grupo" class="form-label">Grado y grupo</label>
                        <select class="form-control" name="grado_grupo" id="grado_grupo" required="true">
                            <?php foreach ($gradosGrupos as $gradgr) : ?>
                                <option value="<?php echo $gradgr['nombre']; ?>" <?php echo $gradgr['nombre'] == $grado_grupo ? 'selected' : ''; ?>>
                                    <?php echo $gradgr['nombre']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="equipo_computo" class="form-label">Equipo de computo</label>
                        <select class="form-control" name="equipo_computo" id="equipo_computo" required="true">
                            <?php foreach ($equiposComputo as $eq_computo) : ?>
                                <option value="<?php echo $eq_computo['nombre']; ?>" <?php echo $eq_computo['nombre'] == $equipo_computo ? 'selected' : ''; ?>><?php echo $eq_computo['nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" name="estado" id="estado" required="true">
                            <?php foreach ($estatus as $estado) : ?>
                                <option value="<?php echo $estado['nombre']; ?>" <?php echo $estado['nombre'] == $estado_servicio ? 'selected' : ''; ?>>
                                    <?php echo $estado['nombre']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_prestamo" class="form-label">Fecha de prestamo</label>
                        <input type="datetime-local" class="form-control" name="fecha_prestamo" id="fecha_prestamo" required="true" value="<?php echo $fecha_prestamo; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="fecha_devolucion" class="form-label">Fecha de devolución</label>
                        <input type="datetime-local" class="form-control" name="fecha_devolucion" id="fecha_devolucion" required="true" value="<?php echo $fecha_devolucion; ?>">
                    </div>
                                        <button type="submit" class="btn btn-success">
                        Agregar
                    </button>
                    <a name="" id="" class="btn btn-danger" href="index.php" role="button">Volver</a>


                </form>
            </div>
            <div class="card-footer text-muted">

            </div>
        </div>



    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <!-- Footer Inicio -->
    <?php include("../../../templates/footer.php"); ?>
    <!-- Footer Fin -->

    <?php include("./templates/librerias-js.php"); ?>
</body>

</html>