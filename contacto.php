<!DOCTYPE html>
<html lang="es">

<head>

    <head>
        <title>Contacto | Sistema de prestamo de equipos de computo</title>
        <!-- Meta -->
        <?php include("./templates/etiquetas-meta.php"); ?>
        <!-- Icono -->
        <link rel="shortcut icon" href="img/favicon.svg" type="image/x-icon">
        <!-- Rel Bootstrap -->
        <?php include("./templates/librerias-head.php"); ?>
        <!-- Estilos -->
        <link href="css/style.min.css" rel="stylesheet">
    </head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar Inicio -->
    <?php include("./templates/header.php");
    ?>
    <!-- Navbar Fin -->


    <!-- Página Encabezado Inicio -->
    <div class="mb-5 container-fluid page-header position-relative">

        <div class="pt-0 pt-2 d-flex flex-column align-items-center justify-content-center pt-lg-5" style="min-height: 200px">
            <h1 class="mt-0 mb-3 text-white display-4 mt-lg-5 text-uppercase">Contacto</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="index.php">Inicio</a></p>
                <p class="px-2 m-0 text-white">/</p>
                <p class="m-0 text-white">Contacto</p>
            </div>
        </div>
    </div>
    <!-- Página Encabezado Fin -->


    <!-- Contacto Inicio -->
    <div class="flex-grow-1">
        <?php include("./templates/views/contacto.php"); ?>
        <?php
// Dirección de correo electrónico del destinatario
$destinatario = "siswebcc@gmail.com";

// Asunto del correo
$asunto = "Asunto del correo";

// Mensaje del correo
$mensaje = "Este es el cuerpo del correo electrónico.";

// Cabeceras del correo
$cabeceras = "From: correo_emisor@gmail.com" . "\r\n" .
             "Reply-To: correo_emisor@gmail.com" . "\r\n" .
             "X-Mailer: PHP/" . phpversion();

// Envía el correo electrónico
if(mail($destinatario, $asunto, $mensaje, $cabeceras)) {
    echo "El correo electrónico ha sido enviado correctamente.";
} else {
    echo "Error al enviar el correo electrónico.";
}
?>
    </div>

    
    

    <!-- Contacto Fin -->


    <!-- Footer Inicio -->
    <div class="mt-auto">
        <?php include("./templates/footer.php"); ?>
    </div>

    <!-- Footer Fin -->


    <!-- JavaScript Libraries -->
    <?php include("./templates/librerias-js.php"); ?>

</body>

</html>