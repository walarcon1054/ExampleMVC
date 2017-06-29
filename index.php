<!DOCTYPE html>
<?php
if ((isset($_POST['placa'])) && ($_POST['placa'] != '') && (isset($_POST['fecha'])) && ($_POST['fecha'] != '') && (isset($_POST['hora'])) && ($_POST['hora'] != '')) {
 
    include "models/modelo.php";
    $nuevo = new Service();
	$pla = $nuevo->verHabilitado($_POST['placa'], $_POST['fecha'], $_POST['hora']);
	
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo Stack Builders</title>
        <link href="css/clockpicker.css" rel="stylesheet">
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
            <div class="row">
                <div class="col-lg-6">
 
                    <form action="#" method="post" class="col-lg-5">
                        <h3>Introduzca los Datos Siguientes</h3>                
                        Placa: <input type="text" name="placa" class="form-control" required/> 
                               <span class="help-block">XXX-9999</span>  
                        Fecha: <input type="text" name="fecha" class="form-control" data-mask="9999/99/99" placeholder="" required>
                               <span class="help-block">yyyy/mm/dd</span>
                        Hora: <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="hora" class="form-control" value="06:30">
                                <span class="input-group-addon">
                                    <span class="fa fa-clock-o"></span>
                                </span>
                            </div>    
                        <br/>
                        
                        <input type="submit" value="Consultar" class="btn btn-success"/>
                    </form>
                </div>
                <div class="col-lg-6 text-center">
                    <hr/>
                    <h3>Horario por Día</h3>
                    <a href="controllers/controlador.php"><i class="fa fa-align-justify"></i> Acceder al Horario Restringido</a>
                    <hr/>
                </div>
                <div class="col-lg-6 text-center">
                    <hr/>
                    <h2><?php echo $pla; ?></h2>
                    <hr/>
                </div> 
            </div>
            <footer class="col-lg-12 text-center">
                Test-Cod - <?php echo date("Y"); ?>
            </footer>
        </div>
    <script src="js/jasny-bootstrap.min.js"></script>
    <!-- Clock picker -->
    <script src="js/clockpicker.js"></script>

   
   <script>
        $(document).ready(function(){

          

            $('.clockpicker').clockpicker();

            
        });


    </script>
    </body>
</html>