<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Asistencia</title>

    <!-- SweetAlert2 para alertas -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Instascan para escaneo de códigos QR -->
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="../admin/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/public/css/font-awesome.css">
    <link rel="stylesheet" href="../admin/public/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../admin/public/css/blue.css">
    <link rel="stylesheet" href="../admin/public/css/all-skins.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../admin/public/img/favicon.ico">

    <!-- Estilos adicionales -->
    <style>
        #preview {
            width: 80%;
            margin: auto;
        }

        .main-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
    <!-- Header -->
    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="../../index2.html" class="navbar-brand"><b>SIS</b>/ASISTENCIA</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="../admin">ADMIN</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Contenido principal -->
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <h4>Registro de asistencia/s</h4>
            </div>

            <div id="camara">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div id="cuadro"></div>
                    <video class="border border-primary" id="preview"></video>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-xs-12">
                <button type="button" id="btnIngreso" onclick="IniciaCamara()" class="btn btn-success">Iniciar cámara</button>
                <button type="button" id="btnSalida" onclick="apagaCamara()" class="btn btn-warning">Apagar cámara</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Versión</b> 0.0.1
        </div>
        
    </footer>

    <!-- Scripts JS -->
    <script src="../admin/public/js/jquery-3.1.1.min.js"></script>
    <script src="../admin/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="scripts/asistencia.js?<?php echo time(); ?>"></script>
</body>
</html>
