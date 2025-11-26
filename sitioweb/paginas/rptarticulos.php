

<?php
/*
if (!isset($_SESSION['cveUsuario'])){
  echo "<script language = 'javascript'> alert('Acceso Denegado, debes de iniciar sesion ...'); </script>";
  echo "<script language = 'javascript'> document.location.href='inicio.php?op=acceso'; </script>";
}*/
$totalProductos=0;
   //######### HACE USO DEL SERVICIO WEB QUE ESTA PUBLICADO DE MANERA LOCAL ########		 
     //######### HACE USO DEL SERVICIO WEB QUE ESTA PUBLICADO DE MANERA LOCAL ########		 
      $cliente=new SoapClient(null, array('uri'=>'http://localhost/',
	  					'location'=>'http://localhost/proweb/1erseg/rappipachuca/servicioweb/servicioweb.php'));	
              //'location'=>'http://100.26.22.228/proweb/1erseg/practica5/servicioweb/servicioweb.php'));	
	  //SE EJECUTA UN MÉTODO DEL SERVICIO WEB, PASANDO SUS PARAMETROS
	  $consulta=$cliente->vwCartaPedidos();
    $destacado = $cliente->vwDestacado();
    $producto_destacado = count($destacado) > 0 ? $destacado[0] : null;

	  $totalProductos=5;	//PARA ESTE EJEMPLO SE DEJÓ FIJO MOSTRAR POR RENGLÓN 3 PRODUCTOS
      
?>

<html>
    <head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <style>
      .todo{
        display: flex;
        justify-content: space-between;
      }
      .destacado{
        background-color: salmon;
      }
      @media (max-width: 1311px) {
     img{
        width: 150px;
         height: 100px;
    }
  }
     </style>
    </head>     
<body> 
  <div class="todo">
<div class="destacado">
<h2>Producto Destacado</h2>
        <?php if ($producto_destacado): ?>
            <a href='?op=rptProductos'>
                <img src='<?php echo $producto_destacado['foto']; ?>' class='img_size' width='200px' height='135px' style='border-radius: 10px;' />               
                <br><strong><?php echo $producto_destacado['nombre']; ?></strong>
                <br>
                <p><?php echo $producto_destacado['descripcion']; ?></p>
                <p class='gray'>$<?php echo $producto_destacado['precio']; ?></p>       
            </a>
        <?php else: ?>
            <p>No hay productos destacados disponibles.</p>
        <?php endif; ?></div>  
  <form name="frmProductos" method="POST">
    <div class="container">
      <table>
        <tr>
          <td colspan="3" style="text-align:left;"><strong>Artículos disponibles:</strong>
          <br><br><br>
  	</td>
    
    <td colspan="3" style="text-align:right;">
      <a href='?op=bienvenida' title='Regresar al inicio'>Regresar a inicio ...</a>
      <br><br><br>
    </td>
  </tr>
    <?php 
      $i=0;

    for($rr=0;$rr<count($consulta);$rr++){

      if($i==0)
        echo "<tr>";
// echo "   <a href='?op=editusuario&ne=".$datos[$rr]["clave"]."' class='btn btn-warning' isActive('rptusuarios.php',$current) title='Editar' >Editar<i class='fa fa-pencil-square-o'></i></a>";
        $clave_producto = $consulta[$rr]['clave'];
        echo "<td style='text-align:center;'>"; 
            echo "<a href='?op=detalleproducto&cve=" . $clave_producto . "'>";
            echo "<img src='".$consulta[$rr]['foto']."' class='img_size' width='250px' height='165px' style='border-radius: 10px;' />";               
            echo "<br><strong>".$consulta[$rr]['nombre']."</strong><br>"; 
            echo "<p class='gray'>$".$consulta[$rr]['precio']."</p>";   		
            echo "</a>";
          echo "</td>";
        $i++;

      //verifica si cierra el renglón e inicializa $i en cero
      if($i==$totalProductos){
        echo "</tr>";
        $i=0;
      }

    } //fin del ciclo for
  ?>
  </table>
  </div>
</form> 
<div class="destacado"><h2>Producto Destacado</h2>
        <?php if ($producto_destacado): ?>
            <a href='?op=rptarticulos'>
                <img src='<?php echo $producto_destacado['foto']; ?>' class='img_size' width='200px' height='135px' style='border-radius: 10px;' />               
                <br><strong><?php echo $producto_destacado['nombre']; ?></strong>
                <br>
                <p><?php echo $producto_destacado['descripcion']; ?></p>
                <p class='gray'>$<?php echo $producto_destacado['precio']; ?></p>       
            </a>
        <?php else: ?>
            <p>No hay productos destacados disponibles.</p>
        <?php endif; ?></div>   
</div>
</body>
</html>