<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo Stack Builders</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="text-center">
                <h1>Ejemplo Stack Builders</h1>
                <hr/>
                <p class="lead">Pico Placa Predictor <br/>
                    Creado por: <br/>
                    Ing. Wilson A. Alarcón M.</p>
            </header>
            <div class="col-lg-6 text-center">
                <hr/>
                <h3>Listado de Horario Restringido</h3>
                <table class="table">
                    <tr>
                        <td><strong>DIA</strong></td>
                        <td><strong>HORA DESDE</strong></td>
                        <td><strong>HORA HASTA</strong></td>
                        <td><strong>PLACAS RESTRINGIDAS</strong></td>
                    </tr>
                    <?php
                    for ($i = 0; $i < count($datos); $i++) {
                        ?>
                        <tr>
                            <td><?php echo $datos[$i]["dia"]; ?></td>
                            <td><?php echo $datos[$i]["hrdesde"]; ?></td>
                            <td><?php echo $datos[$i]["hrhasta"]; ?></td>
                            <td><?php echo $datos[$i]["placa_ini"]." - ".$datos[$i]["placa_fin"]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <a href="../index.php"> <i class="fa fa-arrow-circle-left"></i> Volver a la página principal</a>
                <hr/>
            </div> 
            <footer class="col-lg-12 text-center">
                Test-Cod - <?php echo date("Y"); ?>
            </footer>
        </div>
    </body>
</html>