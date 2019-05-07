
<script language="javascript">
function myFunction(val) {
  
  var= document.getElementById("unit_input_spy").value
}
</script> 
<?php


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
   
           
		   unset($_SESSION['codigo_factura']);  
           
            $created_user    = $_SESSION['id_user'];
			$fecha         = mysqli_real_escape_string($mysqli, trim($_GET['fecha_nota']));
            $exp             = explode('-',$fecha);
            
            
            $codigo_nota_entrega       = mysqli_real_escape_string($mysqli, trim($_GET['cod_nota_entrega']));
            $codigo_usuario   = mysqli_real_escape_string($mysqli, trim($_GET['cod_user']));
			$fecha_ingreso_nota   = $exp[2]."-".$exp[1]."-".$exp[0];
            $_SESSION['codigo_usuario']=$codigo_usuario;
			
			?>
			
			

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Generar Nota de Entrega
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=notas_de_entrega"> Notas de entrega </a></li>
      <li class="active"> Agregar </li>
    </ol>
  </section>

  <!-- Main content -->
   <form role="form" class="form-horizontal" action="modules/nota_de_entrega_multi_fac/guardar_nota_entrega.php?act=insert" method="POST" name="formObatMasuk">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
	  
      

      

          
         

           <div class="row"> 

	           	<div class="col-md-12">

	           		<div class="panel panel-default">

	  					<div class="panel-heading">

	    					<h3 class="panel-title text-center">Hoja de pendientes de entrega<h3>

	  					</div>

	        	

						<div class="panel-body">

							     <div class="row">

				            	<div class="col-md-12"> 

				                    <div class="form-group col-md-3">

				                        <label>Fecha <span class="text-danger"></span></label>

				                        <div class="cal-icon">

				                             <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="fecha_a" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>



				                         </div>

				                    </div>

				                    <div class="form-group col-md-3">

				                        <label>Nº de orden <span class="text-danger"></span></label>

									      	<input type="text" class="form-control" value=" <?php echo $codigo_nota_entrega; ?>" id="codigo_nota" name="codigo_nota" readonly>					      



				                    </div>
									<div class="form-group col-md-3">

				                        <label>Código de Cliente <span class="text-danger"></span></label>

									      	<input type="text" class="form-control" value=" <?php echo $codigo_usuario; ?>" id="codigo_cliente" name="codigo_cliente" readonly>					      



				                    </div>
									<div class="form-group col-md-3">

				                        <label>Almacen <span class="text-danger"></span></label>

									      	<input type="text" class="form-control" value=" " id="codigo_almacen" name="codigo_almacen" readonly>					      



				                    </div>
									

				                </div>   


								<?php
								
								
								 $query_id = mysqli_query($mysqli2, "SELECT CLINOMBRES, CLIRUC, CLITELEFONO FROM clientes where CLICODIGO='".$codigo_usuario."'")
                                                or die('Error : '.mysqli_error($mysqli2));
												  $data = mysqli_fetch_assoc($query_id);
												  
											  
								
								?>
				            <div class="col-md-12">

				  					<div class="form-row">

									    <div class=" form-group col-md-4">

									     	<label for="">Nombre del cliente</label>

									      	<input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" placeholder="Nombre del cliente" value="<?php echo $data['CLINOMBRES'] ?>" readonly>					      

									    </div>

									    <div class="form-group col-md-4">

									      	<label for="">NIT del Cliente</label>

									      	<input type="text" class="form-control" name="dni" id="dni" placeholder="Documento de identidad" value="<?php echo $data['CLIRUC'] ?>" readonly>				      

									    </div>



									    <div class="form-group col-md-4">

									      	<label for="">Teléfono de contacto</label>	

									  			<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese Teléfono" value="<?php echo $data['CLITELEFONO'] ?>" readonly>					 	

				    					</div>

										

				    					

									    <div class="form-group col-md-4">

				    						<label for="">Observaciones</label>

				    						<textarea class="form-control" id="observaciones" name="observaciones" rows="2"></textarea>

				  						</div>									    

				  					</div> 

											                    

				            </div>

						</div>

					</div>

	           	</div>

           </div>



                

    </div>
	<div class="col-md-12">
					<div class="pull-right">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-plus"></span> Agregar productos
						</button>
						
					</div>	
	</div>
    <div id="resultados" class='col-md-12'></div><!-- Carga los datos ajax -->
	
			<!-- Modal -->
			<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<div class="col-sm-6">
						  <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
						</div>
						<button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>
					  </div>
					</form>
					<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
					<div class="outer_div" ></div><!-- Datos ajax Final -->
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					
				  </div>
				</div>
			  </div>
			</div>
			 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/VentanaCentrada.js"></script>
				<script>
		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./modules/nota_de_entrega_multi_fac/productos_cotizacion.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./assets/img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}
	</script>
	<script>
	function agregar (id)
		{
			//alert(id);
			var precio_venta=document.getElementById('xentregar'+id).value;
			var cantidad=document.getElementById('cantidad_'+id).value;
			var vdocuma=document.getElementById('vdocuma'+id).value;
			var codigo_pro=document.getElementById('codigo_pro'+id).value;
			var cant_total=document.getElementById('cant_total'+id).value;
			//Inicia validacion
			/*alert("Precio venta"+precio_venta);
			alert("Cantidad"+cantidad);*/
			
			if (isNaN(cantidad))
			{
			alert('Esto no es un numero cantidad');
			document.getElementById('cantidad_'+id).focus();
			return false;
			}
			if (isNaN(precio_venta))
			{
			alert('Esto no es un numero xentregar');
			document.getElementById('xentregar'+id).focus();
			return false;
			}
			var a =parseInt(precio_venta);
			var b =parseInt(cantidad);
			
			if(b>a)
			{
			alert('La cantidad ingresada es mayor que el saldo por entregar');
			document.getElementById('cantidad_'+id).focus();
			return false;
				
			}
			//Fin validacion
			
			$.ajax({
        type: "POST",
        url: "modules/nota_de_entrega_multi_fac/agregar_cotizador.php",
        data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad+"&vdocuma="+vdocuma+"&codigo_pro="+codigo_pro+"&cant_total="+cant_total,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		 $(':input[type="submit"]').prop('disabled', false);
		}
			});
		}
		
			function eliminar (id)
		{
			
			$.ajax({
        type: "GET",
        url: "modules/nota_de_entrega_multi_fac/agregar_cotizador.php",
        data: "id="+id,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});

		}
		
		$("#datos_cotizacion").submit(function(){
		  var atencion = $("#atencion").val();
		  var tel1 = $("#tel1").val();
		  var empresa = $("#empresa").val();
		  var tel2 = $("#tel2").val();
		  var email = $("#email").val();
		  var condiciones = $("#condiciones").val();
		  var validez = $("#validez").val();
		  var entrega = $("#entrega").val();
		 VentanaCentrada('./pdf/documentos/cotizacion_pdf.php?atencion='+atencion+'&tel1='+tel1+'&empresa='+empresa+'&tel2='+tel2+'&email='+email+'&condiciones='+condiciones+'&validez='+validez+'&entrega='+entrega,'Cotizacion','','1024','768','true');
	 	});
	</script>
     <div class="box-footer">
								  <div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									 <button type="submit" class="btn btn-primary col-md-offset-2" disabled='disabled'>Guardar</button>	
							<button type="reset" onClick="location.href='javascript:window.history.back()'" class="btn btn-reset col-md-offset-2">Cancelar</button>
										
									</div>
								  </div>
								</div><!-- /.box footer -->
					

    

       



			
			
			
			
			
	</div >		
    </div >
      </div>
	  
			
	  </section>		
			
			
			</form>	      	
			
            
           

          
          
           
                  <?php         
               /* if ($query1) {                       
                    
                    header("location: ../../main.php?module=medicines_transaction&alert=1");
                }  */
				
            
      
}  
	
?>