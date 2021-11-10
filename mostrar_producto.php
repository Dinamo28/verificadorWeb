<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script type="text/javascript">
        setTimeout(function() {
            window.location.href = "index.html";
        }, 5000);
    </script>

    <script type="text/javascript">

      if (window.addEventListener) {
      var codigo = "";
      window.addEventListener("keydown", function (e) {
          codigo += String.fromCharCode(e.keyCode);
          if (e.keyCode == 13) {
              window.location = "mostrar_producto.php?codigo=" + codigo;
              codigo = "";
          }
      }, true);
}
</script>
</head>
<body style="background-color:rgb(60, 179, 113);">
  <h1 style='text-align: center'>
    <?php
        include ("./inc/settings.php");
                
        try {
            $conn = new PDO("mysql:host=".$host.";dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $codigo = $_GET["codigo"];
            if (!ctype_digit($codigo)) {
                $codigo = "-1";
            }
            
            $stmt = $conn->prepare("SELECT * FROM productos WHERE producto_codigo = ".$codigo);
            $stmt->execute();
          
            // set the resulting array to associative
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
           
            $renglones=$stmt->rowCount();
            
            if ($renglones==1) {
              echo "<div style='display:flex; position:absolute; left:40%; top:40%; -webkit-transform: translate(-50%, -50%);transform: translate(-50%, -50%);'>
              <div>
              <img src='".$result["producto_imagen"]."' width='400px' height='400px'>
              </div>
              <div style='padding-left:100px; text-align: left;'>
              Producto: ".$result["producto_nombre"]."<br>
              Precio: ".$result["producto_precio"]."<br>
              Stock: ".$result["producto_stock"]."<br>
              </div>
              </div>";
            }
            else{
              echo "<div style='display:flex; position:absolute; left:50%; top:40%; -webkit-transform: translate(-50%, -50%);transform: translate(-50%, -50%);'>
              <div><img src='img/error.png' alt='' width='60%' height='60%' ><br>
              No se pudo encontrar el <br>producto, Intente de nuevo o <br>pase a servicio al cliente</div>
              </div>";
            }
            
            
          } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
    ?>
  </h1>
</body>
<footer style="padding-top:35%;">
<h1 style="text-align: center;">Esperando por articulo...</h1>
        <img src="img/SuperDelSur.png" height="95px" width="158px" style="padding-left: 25%;">
        <img src="img/Scan.png" height="95px" width="158px" style="padding-left: 9.5%;">
</footer>

</html>