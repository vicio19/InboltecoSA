

<?php
session_start();

require_once "../../config/database.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
      
            $usuario =$_SESSION['username'];
            $codigo_nota = mysqli_real_escape_string($mysqli, trim($_POST['codigo_nota']));
			$codigo_cliente = mysqli_real_escape_string($mysqli, trim($_POST['codigo_cliente']));
			$codigo_almacen = mysqli_real_escape_string($mysqli, trim($_POST['codigo_almacen']));
			$nombre_cliente = mysqli_real_escape_string($mysqli, trim($_POST['nombre_cliente']));
			$dni = mysqli_real_escape_string($mysqli, trim($_POST['dni']));
			$telefono = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
			$numero_factura = mysqli_real_escape_string($mysqli, trim($_POST['numero_factura']));
			$vcaja = mysqli_real_escape_string($mysqli, trim($_POST['vcaja']));
			$total_factura = mysqli_real_escape_string($mysqli, trim($_POST['total_factura']));
			$observaciones = mysqli_real_escape_string($mysqli, trim($_POST['observaciones']));
			$fecha         = mysqli_real_escape_string($mysqli, trim($_POST['fecha_a']));
			$exp             = explode('-',$fecha);
            $fecha_a   = $exp[2]."-".$exp[1]."-".$exp[0];
            
			
            $created_user    = $_SESSION['id_user'];

          
            $query = mysqli_query($mysqli, "INSERT INTO profor(VDOCUM,VFECHA,VNOMBRE,VRUC,VCAJA,VFACTURA,VUSUARIO,AGECODIGO,CLICODIGO,VGLOSA) 
                                            VALUES('$codigo_nota','$fecha_a','$nombre_cliente','$dni','$vcaja','$numero_factura','$usuario','$codigo_almacen','$codigo_cliente','$observaciones')")
                                            or die('Error: '.mysqli_error($mysqli));    

           
            $sql=mysqli_query($mysqli, "select * from prof_temp where ANEXO='$numero_factura'");
			while ($row=mysqli_fetch_array($sql))
			{
			$cod_pro=$row["CODIGO"];
			$cantidad_pro=$row["VCANTIDAD"];
			$nro_factura=$row["ANEXO"];
			
			$query_detalle = mysqli_query($mysqli, "INSERT INTO profor1(VDOCUM,VFECHA,AGECODIGO,CLICODIGO,VCAJA,CODIGO,VCANTIDAD,ANEXO) 
                                            VALUES('$codigo_nota','$fecha_a','$codigo_almacen','$codigo_cliente','$vcaja','$cod_pro','$cantidad_pro','$nro_factura')")
                                            or die('Error: '.mysqli_error($mysqli));  
			
			
			
			}
			
			$delete=mysqli_query($mysqli, "DELETE  FROM prof_temp");
			                  
                    
            header("location: ../../main.php?module=notas_de_entrega");
            
			
			   
    }
}       
?>