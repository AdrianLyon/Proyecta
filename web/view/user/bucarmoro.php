 
<!DOCTYPE html>
<html>
 <?php 
 $con=mysql_connect("localhost","root","");
       mysql_select_db("prueba", $con); 
     
if($_POST['buscar']) 
{   
   ?>
   <!-- el resultado de la búsqueda lo encapsularemos en un tabla -->
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link   href="../../css/bootstrap.min.css" rel="stylesheet">
    <script src="../../js/bootstrap.min.js"></script>
    <title>Busqueda de clientes morosos</title>
  
</head>
<div class="container">
  <div class="row">
   <a class="btn" href="morosos.php">Regresar</a>
    
  </div>
  

  <table class="table table-striped table-bordered">
       <tr>
            <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td width="100" align="center"><strong>Agencia</strong></td>
            <td width="100" align="center"><strong>Num Cliente</strong></td>
            <td width="100" align="center"><strong>Nombre</strong></td>
            <td width="100" align="center"><strong>Fecha Operativa</strong></td>
            <td width="100" align="center"><strong>Fecha Pago</strong></td>
            <td width="100" align="center"><strong>Monto</strong></td>
       </tr> 
       <?php

       //obtenemos la información introducida anteriormente desde nuestro buscador PHP
       
       $nombre = $_POST["palabra"];
       

       /* ahora ejecutamos nuestra sentencia SQL, lo que hemos vamos a hacer es usar el 
       comando like para comprobar si existe alguna coincidencia de la cadena insertada 
       en nuestro campo del formulario con nuestros datos almacenados en nuestra base de 
       datos, la cadena insertada en el buscador se almacenará en la variable $buscar */
 
       /* hemos usado también la sentencia or para indicarle que queremos que nos encuentre
       las coincidencias en alguno de los campos de nuestra tabla (apellidos o nombre), 
       si hubiéramos puesto un and solo nos devolvería el resultado del filtro en el 
       caso de cumplirse las dos condiciones */
 
       $consulta_mysql= mysql_query ("SELECT agencia, num_cliente, nombre, fecha_operativa, fecha_pago,monto, id FROM morosos WHERE nombre like '%$nombre%'");
      

 
       while($registro = mysql_fetch_assoc($consulta_mysql)) 
       {
           ?> 
           <tr>
               <!--mostramos el nombre y apellido de las tuplas que han coincidido con la 
               cadena insertada en nuestro formulario-->
               <td class="estilo-tabla" align="center"><?=$registro['agencia']?></td>
               <td class=”estilo-tabla” align="center"><?=$registro['num_cliente']?></td>
               <td class=”estilo-tabla” align="center"><?=$registro['nombre']?></td>
               <td class=”estilo-tabla” align="center"><?=$registro['fecha_operativa']?></td>
               <td class=”estilo-tabla” align="center"><?=$registro['fecha_pago']?></td>
               <td class=”estilo-tabla” align="center"><?=$registro['monto']?></td>
               <!-- <td width=250><?php  echo '<a class="btn btn-success" href="update.php?id='.$registro['id'].'">Modificar</a>';  echo '<a class="btn btn-danger" href="delete.php?id='.$registro['id'].'">Borrar</a>';?></td> -->
               <!-- <td width=250>';
                    <a class="btn" href="read.php?"><?=$registro['id']?>Ver</a>
                    <a class="btn btn-success" href="update.php?"><?=$registro['id']?>Modificar</a>
                    
                    <a class="btn btn-danger" href="delete.php?"><?=$registro['id']?>Borrar</a>
                </td>'; -->
           </tr> 
           <?php 
       } //fin blucle
        
    ?>
    </table>
    </div>
    <?php

} // fin if 



?>
              
</body>
</html>