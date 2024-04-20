<!DOCTYPE html>
<html lang="es">

<head>
<title>Historial prestamos | Sistema de prestamo de equipos de computo</title>
    <!-- Meta -->
    <?php include("./templates/etiquetas-meta.php"); ?>
    <!-- Icono -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Rel Bootstrap -->
    <?php include("./templates/librerias-head.php"); ?>
    <!-- Estilos -->
    <link href="css/style.min.css" rel="stylesheet">
</head>


<body>
<?php 
include("./admin/bd.php"); // We need to add the db

if(isset($_GET['txtID'])){ // If the key 'txtID' exists in the $_GET array
    $sentencia=$conexion->prepare("DELETE FROM `tbl_historial_prestamos` WHERE ID=:ID"); // Prepare the query
    $sentencia->bindParam(':ID', $_GET['txtID']);
    $sentencia->execute();
}
 $sentencia=$conexion->prepare("SELECT * FROM `tbl_historial_prestamos`");
 $sentencia->execute();
    $lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC); // We need to fetch the data
     
    include("../../templates/header.php");
?>
     <!-- Navbar Inicio -->
     <?php include("./templates/header.php");
?>
    <!-- Navbar Fin -->


    <!-- Página Encabezado Inicio -->
    <div class="mb-5 container-fluid page-header position-relative overlay-bottom">
        <div class="pt-0 d-flex flex-column align-items-center justify-content-center pt-lg-5" style="min-height: 400px">
            <h1 class="mt-0 mb-3 text-white display-4 mt-lg-5 text-uppercase">Prestamos</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="px-2 m-0 text-white">/</p>
                <p class="m-0 text-white">Services</p>
            </div>
        </div>
    </div>
    <!-- Página Encabezado Fin -->

    
<!-- Prestamos Inicio -->
    <!-- <div class="py-5 container-fluid">
        <div class="container">
            <div class="reservation position-relative overlay-top overlay-bottom">
                <div class="row align-items-center">
                    <div class="my-5 col-lg-6 my-lg-0">
                        <div class="p-5">
                            <div class="mb-4">
                                <h1 class="display-3 text-primary">Utilizando tu Credencial Universitaria</h1>
                                <h1 class="text-white">Tienes derecho al uso de los Equipos de computo.</h1>
                            </div>
                            <p class="text-white">El metodo de Apartado y/o Reservaci&oacute;n de Equipos de manera Presencial es utilizar tu Credencial Universitaria e ir al Centro de Computaci&oacute;n y preguntar si tienen algun Equipo disponible.</p>
                            <ul class="m-0 text-white list-inline">
                                <p class="text-white">El metodo de Apartado y/o Reservaci&oacute;n de Equipos de manera Virtual es registrarte en la parte de abajo utilizando tu Correo Institucional y llenar los Espacios que se te solicitan.</p>
                                <ul class="m-0 text-white list-inline">
                                    <h1 class="text-white">Indicaciones que debes seguir...</h1>
                                <li class="py-2"><i class="mr-3 fa fa-check text-primary"></i>Utilizar los Equipos de manera coherente y cuidadosa.</li>
                                <li class="py-2"><i class="mr-3 fa fa-check text-primary"></i>Unicamente puedes utilizar los Equipos dentro del horario establecido por el/la encargad@.</li>
                                <li class="py-2"><i class="mr-3 fa fa-check text-primary"></i>En caso de algun imprevisto golpe o rayon hacia los equipos se le hara un llamado a que se haga responsable por las molestias ocasionadas hacia los equipos.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5 text-center" style="background: rgba(51, 33, 29, .8);">
                            <h1 class="mt-5 mb-4 text-white">Anota tu Informaci&oacute;n</h1>
                            <form class="mb-5">
                                <div class="form-group">
                                    <input type="text" class="p-4 bg-transparent form-control border-primary" placeholder="Nombre"
                                        required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="p-4 bg-transparent form-control border-primary" placeholder="Correo Institucional"
                                        required="required" />
                                </div>
                                <div class="form-group">
                                    <div class="date" id="date" data-target-input="nearest">
                                        <input type="text" class="p-4 bg-transparent form-control border-primary datetimepicker-input" placeholder="Fecha" data-target="#date" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="time" id="time" data-target-input="nearest">
                                        <input type="text" class="p-4 bg-transparent form-control border-primary datetimepicker-input" placeholder="Horario" data-target="#time" data-toggle="datetimepicker"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="px-4 bg-transparent custom-select border-primary" style="height: 49px;">
                                        <option selected>N&uacute;mero de Equipo</option>
                                        <option value="1">Equipo 1</option>
                                        <option value="2">Equipo 2</option>
                                        <option value="3">Equipo 3</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <button class="py-3 btn btn-primary btn-block font-weight-bold" type="submit">Mandar Tu Informaci&oacute;n</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Prestamos Inicio -->
    
<div class="card">
    <div class="card-header">
    <a
        name=""
        id=""
        class="btn btn-primary"
        href="prestamos-crear.php"
        role="button"
        >Agregar registro</a
    >
        
    </div>
    <div class="card-body">
    <div
        class="table-responsive-sm"
    >
        <table
            class="table"
        > 
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Asunto</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha  Creación</th>
                </tr>
            </thead>
            <tbody>
                <!-- Go through all records -->
                <?php foreach($lista_servicios as $registro) {?>
                    <tr class="">
                    <td><?php echo $registro['ID'] ?></td>
                    <td><?php echo $registro['s_asunto'] ?></td>
                    <td><?php echo $registro['s_descripcion'] ?></td>
                    <td><?php echo $registro['d_fecha_creacion'] ?></td>
                    <td>
           
                        
                    </td>
                </tr>
             
               <?php } ?>
              
            </tbody>
        </table>
    </div>
    
    </div>
</div>
    <!-- Prestamos Fin -->


    <!-- Footer Inicio -->
    <?php include("./templates/footer.php");?>
    <!-- Footer Fin -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
       <?php include("./templates/librerias-js.php");?>

</body>

</html>