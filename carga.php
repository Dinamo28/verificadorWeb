<!DOCTYPE html>
<html lang="en">
<head style="background-color:rgb(60, 179, 113);">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Precios</title>
    <style>
        div {
            height: 540px;
            position: relative;
        }
        h1 {
            text-align: center;
            font-size: 20px;
        }
    </style>

    <script type="text/javascript">
        setTimeout(function(){
            var codigo = "<?php echo $_GET["codigo"]; ?>";
            window.location = "mostrar_producto.php?codigo=" + codigo; 
        }, 1500);
    </script> 
</head>

<body style="background-color:rgb(60, 179, 113);">
    <center>
        <img src="img/loading-waiting.gif" height="400px" width="400px" style="padding-top: 10%;">
    </center></div>
</body>
</html>