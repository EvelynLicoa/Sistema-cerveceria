<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Da" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- main -->
    <link href="css/main.css" rel="stylesheet">


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/crono.js"></script>
</head>
        <body>

            <div class="separator"></div>

<!--            <h1 class="site-title text-center"><i class="fa fa-clock-o" aria-hidden="true"></i> PRODUCCIÓN</h1>-->


            <div class="separator"></div>

            <div id="content">
                <div class="contador container">
                    <div id="inpHora" class="times row crono-width">

                    </div>
                    <div id="btn_ini_fin" class="row crono-width">

                    </div>
                </div>
            </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#btn_ini_fin').load('componentes/botonesMacerado.php');
                $('#inpHora').load('componentes/hora.php');
            });
        </script>
        </body>
</html>


  
       