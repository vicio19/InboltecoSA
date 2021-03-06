<?php

	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	/* Connect To Database*/
	require_once "../../config/database.php";
	session_start();
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('codigo_producto', 'nombre_producto');//Columnas de busqueda
		 $sTable = "factura_detalle";
		
		 $sWhere = "WHERE CLICODIGO = '".$_SESSION['codigo_usuario']."'";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 50; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		
		$count_query   = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './index.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($mysqli, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					<th>Código Factura</th>
					<th>Código Producto</th>
					<th>Total Producto</th>
					<th>Entregado</th>
					<th align="center">Entregar</th>
					<th align="center">Cantidad</th>
					<th style="width: 36px;"></th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){

					$ORDEN=$row['ORDEN'];
					
					
					$VDOCUMA=$row['VDOCUMA'];
					$CODIGO=$row['CODIGO'];
					$VCANTIDAD=$row['VCANTIDAD'];
					/*$codigo_producto=$row["codigo_producto"];
					$sql_marca=mysqli_query($mysqli, "select nombre_marca from marcas_demo where id_marca='$id_marca_producto'");
					$rw_marca=mysqli_fetch_array($sql_marca);
					$nombre_marca=$rw_marca['nombre_marca'];
					$precio_venta=$row["precio_producto"];
					$precio_venta=number_format($precio_venta,2); */
					?>
					<tr>
						<td><input type="number" class="form-control"  id="vdocuma<?php  echo $ORDEN; ?>"  value="<?php  echo $VDOCUMA; ?>" readonly ></td>
						<td><input type="text" class="form-control"  id="codigo_pro<?php  echo $ORDEN; ?>"  value="<?php  echo $CODIGO; ?>" readonly ></td>
						<td ><input type="number" class="form-control"  id="cant_total<?php  echo $ORDEN; ?>"  value="<?php  echo $VCANTIDAD; ?>" readonly ></td>
						<td >
						<?php
								$query_detalle_f = mysqli_query($mysqli, "SELECT SUM( VCANTIDAD ) AS CANTIDAD FROM profor1 WHERE ANEXO='".$VDOCUMA."' and CODIGO ='".$CODIGO."'")
                                                or die('Error : '.mysqli_error($mysqli));
												  $data_detalle = mysqli_fetch_assoc($query_detalle_f);
												  $entregado=$data_detalle["CANTIDAD"];
												  
												  if($entregado=='')
												  {
													  $entregado='0';
													  
												  }  
												  $xentregar=$VCANTIDAD-$entregado;
												  
												  
												  
								
								?>
						
						
						<input type="number" class="form-control" style="text-align:right" id="etregado<?php  echo $ORDEN; ?>"  value="<?php echo  $entregado; ?>" readonly >
						
						</td>
						<td >
						
						<input type="number" class="form-control" style="text-align:right" id="xentregar<?php  echo $ORDEN; ?>"  value="<?php echo  $xentregar; ?>" readonly >
						
						</td>
						<td >
						
						<input type="number" class="form-control" style="text-align:right" id="cantidad_<?php  echo $ORDEN; ?>"  value=""  min='0'>
						
						</td>
						<td ><span class="pull-right"><a href="#" onclick="agregar('<?php  echo $ORDEN ?>')"><i class="glyphicon glyphicon-plus"></i></a></span></td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=5><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>