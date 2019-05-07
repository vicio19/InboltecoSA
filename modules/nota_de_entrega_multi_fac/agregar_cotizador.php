<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
session_start();
$session_id= session_id();
if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}

if (isset($_POST['vdocuma'])){$vdocuma=$_POST['vdocuma'];}
if (isset($_POST['codigo_pro'])){$codigo_pro=$_POST['codigo_pro'];}
if (isset($_POST['cant_total'])){$cant_total=$_POST['cant_total'];}

	/* Connect To Database*/
	require_once "../../config/database.php";
	$codigo_usuario    = $_SESSION['codigo_usuario'];
if (!empty($id) and !empty($cantidad) and !empty($precio_venta))
{
	$fecha= date("Y-m-d H:i:s");
	
	
	
	$query=mysqli_query($mysqli, "select * from prof_temp  where  ORDEN='$id' and ANEXO='$vdocuma' ")or die('error '.mysqli_error($mysqli));
	 $count  = mysqli_num_rows($query);
	 
	 	 
	 
	 
	if($count!=''){
		
	$update_tmp=mysqli_query($mysqli, "Update prof_temp set VCANTIDAD='$cantidad' WHERE ORDEN='$id' and ANEXO='$vdocuma'");	
		
	}
	else{
	
	$insert_tmp=mysqli_query($mysqli, "INSERT INTO prof_temp (VFECHA,CLICODIGO,CODIGO,VCANTIDAD,ORDEN,ANEXO) VALUES ('$fecha','$codigo_usuario','$codigo_pro','$cantidad',$id,'$vdocuma')");	
	}
	
	
}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
	
	$delete=mysqli_query($mysqli, "DELETE FROM prof_temp WHERE ORDEN='".$_GET['id']."'");
}

?>
<div class="row">
     
<div class="panel panel-default">

	  					<div class="panel-heading">

	    					<h3 class="panel-title text-center">DETALLE FACTURA</h3>

	  					</div>

	  					

						<hr>
<table class="table">
<tr>
	<th>Cod. Factura</th>
	<th>Cod. Producto</th>
	<th>Descripción</th>
	<th><span class="pull-right">Cantidad.</span></th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	

	$sql=mysqli_query($mysqli, "select * from prof_temp where CLICODIGO='$codigo_usuario' ");
	
	
	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["ORDEN"];
	$id_factura=$row["ANEXO"];
	
	$codigo_producto=$row['CODIGO'];
	
	
	$sql_product=mysqli_query($mysqli2, "select DESCRIP from stock  where CODIGO='$codigo_producto'");
	$rw_nomb_pro=mysqli_fetch_array($sql_product);
	$nombre_producto=$rw_nomb_pro['DESCRIP'];
	
	
	
	
	$cantidad=$row['VCANTIDAD'];
	
	
	
	/*$precio_venta=$row['precio_tmp'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	*/
		?>
		<tr>
			<td><?php echo $id_factura;?></td>
			<td><?php echo $codigo_producto;?></td>
			<td><?php echo utf8_encode($nombre_producto);?></td>
			<td><span class="pull-right"><?php echo $cantidad;?></span></td>
			
			<td ><span class="pull-right"><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></span></td>
		</tr>		
		<?php
	}

?>

</table>
</div>

</div>
					