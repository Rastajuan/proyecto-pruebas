<!DOCTYPE html>

<html lang="es">

<head>
    <title>Contacto</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rellena este formulario para contactar con García Music ¿Cómo podemos ayudarte?">
    <meta name="title" content="Contacto">
    <meta name="keywords" content="contacto, formulario">
    <meta name="robots" content="noindex, nofollow">
    <!--Llamada al archivo de CSS-->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
</head>

<body>

    <div id="formularioHome" class="row d-flex justify-content-center align-content-center">
        <form role="form" method="post" class="col-12" name="formulario" action="contactar.php">

            <div class="col-12 form-floating mb-3">
                <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre">
                <label for="nombre">Nombre*</label>
            </div>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="correo" class="form-control" name="correo" placeholder="Email">
                <label for="correo">Email*</label>
            </div>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Teléfono">
                <label for="telefono">Teléfono</label>
            </div>
            <div class="col-12 form-floating mb-3">
                <input type="text" id="mensaje" class="form-control" name="mensaje" placeholder="Mensaje">
                <label for="mensaje">Mensaje*</label>
            </div>
            <div class="col-12 form-floating mb-3">
                <a href="formulario_login.php">¿Ya tienes una cuenta? Accede al <u>chat del Área Clientes</u></a>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <button type="submit" id="contactar" class="btn btn-warning" name="contactar" value="contactar">Contactar</button>
            </div>
            <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold; text-align:center">
            </div>
         <div id="msgError" style="margin-top: 10px; color:red;font-weight:bold;"></div>
        </form>
    </div>

</body>

</html>
