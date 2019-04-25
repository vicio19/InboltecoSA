<?php
	
$id_factura=$_GET['id'];

	$query_perfil=mysqli_query($mysqli,"select * from factura where VDOCUMA='".$id_factura."'");
	$rw=mysqli_fetch_assoc($query_perfil);

	/*$sql=mysqli_query($con, "select LAST_INSERT_ID(id) as last from facturas order by id desc limit 0,1 ");
	$rws=mysqli_fetch_array($sql);
	$numero=$rws['last']+1;
	*/
?>
 <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Detalle de Facturas
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=medicines_transaction"> Entrada </a></li>
      <li class="active"> Agregar </li>
    </ol>
  </section>

<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/medicines_transaction/proses.php?act=insert" method="POST" name="formObatMasuk">
            <div class="box-body">
        		
      
            <!--
               
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <h3>Cochabamba: </h3> 
					<strong>Fábrica</strong>Av. Chapare s/n Carretera a Sacaba Km. 5<br />
                    <strong> E-mail :</strong> info@inbolteco.com<br />
                   	<strong> Teléfonos:</strong> (591 -4) 4720674 - 4720685<br />
					<strong> Línea Gartuita:</strong> 800108352<br />
					<strong> Fax :</strong>  (591 -4) 4720744<br />
					<strong> E-mail :</strong> info@inbolteco.com<br />
               </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <h3>Santa Cruz </h3> 
					<strong>Oficina de Ventas: </strong> Av. 4to anillo, esquina Carlos Saavedra (entre Radial 19 casi Av. Piraí)
                    <br />
                    <strong>Teléfonos :</strong> (591 -3) 358-1888 <br />
					<strong>Linea Gratuita:</strong> 800108352 <br />
					<strong> E-mail :</strong> info@inbolteco.com<br />
                </div>
			-->
           
          
            
            

            <div class="row ">
			<hr />
				<?php 
					$query_cliente=mysqli_query($mysqli2,"select * from clientes where CLICODIGO='".$rw["CLICODIGO"]."'")or die('error:'.mysqli_error($query_cliente));
					$rw_cliente=mysqli_fetch_assoc($query_cliente);
				?>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <a href="#" target="_blank">  <img src="assets/img/default-logo.png" alt="Logo sistemas web" style="padding: 30px 0 0 50px" /></a>
                </div>
				<div class="col-lg-4 col-md-4 col-sm-4">
                    <h2>Detalles del cliente :</h2>
                   <strong>Código: </strong><?php echo  $rw_cliente["CLICODIGO"]  ?><br />
                   <strong>Nombres: </strong><?php echo  utf8_encode($rw_cliente["CLINOMBRES"])  ?><br />
                   <strong>Dirección: </strong><?php echo  utf8_encode($rw_cliente["CLIDIRECCION"])  ?><br />
				   <strong>Telefóno: </strong><?php echo  $rw_cliente["CLITELEFONO"]  ?><br />
				   <strong>Nit: </strong><?php echo  $rw_cliente["CLIRUC"]  ?><br />
                </div>
				
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <h2>Detalles de la factura:</h2>
                    <strong>Caja: </strong><?php echo  $rw["VCAJA"]  ?><br />
					<strong>Código :</strong><?php echo  $id_factura  ?><br />
                    <strong>Almacén: </strong> <?php echo  $rw["AGECODIGO"]  ?><br />
					<strong>Moneda: </strong> Bs<br />
					<strong>Tipo de Cambio: </strong> <?php echo  $rw["VTC"]  ?><br />
					<strong>Fecha: </strong> <?php echo  $rw["VFECHA"]  ?><br />
					<strong>Total: </strong> <?php echo  number_format($rw["TOTALFAC"],2)?>    <br>
					<?php echo $rw["TOTALLIT"] ?>
				
								
                  
                    
                  
                </div>
            </div>
            
         
            <div class="row">
			<hr />
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped  table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class='text-center'>Código</th>
									<th>Descripción</th>
									<th class='text-center'>Presentacion</th>
                                    <th class='text-center'>Unidad</th>
                                    <th class='text-center'>tp</th>
									<th class='text-center'>Saldo Stock</th>
									<th class='text-center'>Cantidad</th>
									<th class='text-center'>Precio Lista</th>
									<th class='text-center'>Desctos x Item</th>
									<th class='text-center'>Descuentos</th>
									<th class='text-center'>Precio Unitario</th>
									<th class='text-center'>Importe Total</th>
									<th class='text-center'>Anexo</th>
									
                                </tr>
                            </thead>
                            <tbody>
                                <?php
								
									

	
				$query2_detalle = mysqli_query($mysqli, "SELECT * FROM factura_detalle WHERE VDOCUMA LIKE '".$id_factura."' ")or die('error:'.mysqli_error($query2_detalle));
								while ($data4 = mysqli_fetch_assoc($query2_detalle)) { 
									
									echo "<td>".$data4["CODIGO"]."</td>";
									$query_perfil=mysqli_query($mysqli2,"select * from stock where CODIGO='".$data4["CODIGO"]."'");
									$rw=mysqli_fetch_assoc($query_perfil);
									echo "<td>".utf8_encode($rw["DESCRIP"])."</td>";
									echo "<td>".utf8_encode($rw["DESCRIP1"])."</td>";
									echo "<td align='center'>".utf8_encode($rw["UNIDAD"])."</td>";
									echo "<td></td>";
									echo "<td></td>";
									echo "<td align='right'>".$data4["VCANTIDAD"]."</td>";
									echo "<td align='center'>".$data4["VPREUNIL"]."</td>";
									echo "<td align='center'>".$data4["VDESCUENTO"]."</td>";
									echo "<td align='center'>".$data4["VDESCUENTO"]."</td>";
									echo "<td align='center'>".$data4["VPREUNI"]."</td>";
									echo "<td align='center'>".number_format($data4["TOTAL"],2)."</td>";
									echo "<td>".utf8_encode($data4["ANEXO"])."</td>";
									
									
										
									
								}
								?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
           
           
            
		
       
       <div class="row"> <hr /></div>
        <div class="row pad-bottom  pull-right">
		
            <div class="col-lg-12 col-md-12 col-sm-12">
                <button type="submit" class="btn btn-success ">Guardar factura</button>
             
              

                
            </div>
        </div>
	</div>
 </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
		
  
