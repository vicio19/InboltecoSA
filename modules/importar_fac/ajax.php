<?php
session_start();

//echo 'Hola. Soy el nuevo contenido que viene del servidor!';

require_once "../../config/database.php";




    $query_vaciar = mysqli_query($mysqli, "TRUNCATE TABLE  temp")
                                            or die('error: '.mysqli_error($query_vaciar));
											
	$query_vaciar_detalle = mysqli_query($mysqli, "TRUNCATE TABLE  temp_detalle")
                                            or die('error: '.mysqli_error($query_vaciar_detalle));											
 


			
			/**** PARA CARGAR POR PRIMERA VEZ  */
 $query2 = mysqli_query($mysqli2, "SELECT * FROM ventas WHERE VGLOSA LIKE '%pendiente%' ")
                                            or die('error: '.mysqli_error($mysqli2));
											
	
	
	
  while ($data2 = mysqli_fetch_assoc($query2)) { 
 
  $query = mysqli_query($mysqli, "INSERT INTO temp(VDOCUM, VDOCUMA, VFECHA, VNOMBRE, VRUC, VCAJA, VFACTURA, VORDEN, VPEDIDO, VTRANS, VTC, VMONEDA, VANULADA, VUSUARIO, AGECODIGO, CLICODIGO, DESCODIGO, 
  VENCODIGO, VDESCUENTOS, VTIPRE, VGLOSA, PROFORMA, VDIAS, VENCIMIENTO, TOTALFAC, ICE, DESCUENTOS, OTROS, TOTALLIT, XENTREGAR, VMARCA, DESC1, DESC2, DESC3, DESC4, HORAGRA, FECHAGRA, NO_AUTO, LLAVE_DOS, 
  FECHA_LIMITE, NO_CONTROL, NO_CUENTA, IDCITA, TIPO_PAGO, TIPO_TARJETA, BANCO, BANCO_DCTO, ENTREGADOBS, ENTREGADOUS, CAMBIO, NLOTE, FACTURAEXP, TASACERO, HOJA, ANEXO1, ANEXO2, ANEXO3, ANEXO4, DESPACHO, 
  DESPACHOHORA, ATCBS, ATCUS, TOTALCOBRADO, NITTIPO, ICEADICIONAL)
  VALUES('".$data2['VDOCUM']."','".$data2['VDOCUMA']."','".$data2['VFECHA']."','".$data2['VNOMBRE']."','".$data2['VRUC']."','".$data2['VCAJA']."','".$data2['VFACTURA']."','".$data2['VORDEN']."','".$data2['VPEDIDO']."',
  '".$data2['VTRANS']."','".$data2['VTC']."','".$data2['VMONEDA']."','".$data2['VANULADA']."','".$data2['VUSUARIO']."','".$data2['AGECODIGO']."','".$data2['CLICODIGO']."','".$data2['DESCODIGO']."','".$data2['VENCODIGO']."',
  '".$data2['VDESCUENTOS']."','".$data2['VTIPRE']."','".$data2['VGLOSA']."','".$data2['PROFORMA']."','".$data2['VDIAS']."','".$data2['VENCIMIENTO']."','".$data2['TOTALFAC']."','".$data2['ICE']."','".$data2['DESCUENTOS']."',
  '".$data2['OTROS']."','".$data2['TOTALLIT']."','".$data2['XENTREGAR']."','".$data2['VMARCA']."','".$data2['DESC1']."','".$data2['DESC2']."','".$data2['DESC3']."','".$data2['DESC4']."','".$data2['HORAGRA']."',
  '".$data2['FECHAGRA']."','".$data2['NO_AUTO']."','".$data2['LLAVE_DOS']."','".$data2['FECHA_LIMITE']."','".$data2['NO_CONTROL']."','".$data2['NO_CUENTA']."','".$data2['IDCITA']."',
  '".$data2['TIPO_PAGO']."','".$data2['TIPO_TARJETA']."','".$data2['BANCO']."','".$data2['BANCO_DCTO']."','".$data2['ENTREGADOBS']."','".$data2['ENTREGADOUS']."','".$data2['CAMBIO']."','".$data2['NLOTE']."'
  ,'".$data2['FACTURAEXP']."','".$data2['TASACERO']."','".$data2['HOJA']."','".$data2['ANEXO1']."','".$data2['ANEXO2']."','".$data2['ANEXO3']."','".$data2['ANEXO4']."','".$data2['DESPACHO']."'
  ,'".$data2['DESPACHOHORA']."','".$data2['ATCBS']."','".$data2['ATCUS']."','".$data2['TOTALCOBRADO']."','".$data2['NITTIPO']."','".$data2['ICEADICIONAL']."')")
                                            or die('error: '.mysqli_error($mysqli));    
		
  /******************************************** cargar detalle ********************************************************************/
  
	$query2_detalle = mysqli_query($mysqli2, "SELECT * FROM ventas1 WHERE VDOCUMA LIKE '".$data2['VDOCUMA']."' ")
                                            or die('error: '.mysqli_error($query2_detalle));
		 while ($data4 = mysqli_fetch_assoc($query2_detalle)) { 
			
		 $query = mysqli_query($mysqli, "INSERT INTO temp_detalle(VDOCUM, VDOCUMA,AGECODIGO,CLICODIGO,VENCODIGO,DESCODIGO,VFECHA,VTC,VCAJA,VMONEDA,CODIGO,VCANTIDAD,VCANTIDADP,VPREUNIL,VDESCUENTO,VPREUNI,VPESO,COSTOMN,
		 COSTOME,VTIPRE,XENTREGAR,VMARCA,CLOTE,ORDEN,VTRANS,VCANTIDAD1,ICE,TOTAL,ANEXO,DESPACHO,PROFORMA,DESCUENTOCOL) VALUES('".$data4['VDOCUM']."','".$data4['VDOCUMA']."','".$data4['AGECODIGO']."','".$data4['CLICODIGO']."',
		 '".$data4['VENCODIGO']."','".$data4['DESCODIGO']."','".$data4['VFECHA']."','".$data4['VTC']."','".$data4['VCAJA']."','".$data4['VMONEDA']."','".$data4['CODIGO']."','".$data4['VCANTIDAD']."','".$data4['VCANTIDADP']."',
		 '".$data4['VPREUNIL']."','".$data4['VDESCUENTO']."','".$data4['VPREUNI']."','".$data4['VPESO']."','".$data4['COSTOMN']."','".$data4['COSTOME']."','".$data4['VTIPRE']."','".$data4['XENTREGAR']."','".$data4['VMARCA']."',
		 '".$data4['CLOTE']."','".$data4['ORDEN']."','".$data4['VTRANS']."','".$data4['VCANTIDAD1']."','".$data4['ICE']."','".$data4['TOTAL']."','".$data4['ANEXO']."','".$data4['DESPACHO']."','".$data4['PROFORMA']."',
		 '".$data4['PROFORMA']."')") or die('error: '.mysqli_error($mysqli));    
		 }
  
  }
		
		
		
		/* actualizamos de los datos que faltan  */
		
		$query_buscar = mysqli_query($mysqli, "SELECT * FROM temp WHERE not exists (SELECT * FROM factura WHERE temp.vdocum = factura.vdocum)") or die('error: '.mysqli_error($mysqli));
		while ($data3 = mysqli_fetch_assoc($query_buscar)) { 
		
		 $query_update = mysqli_query($mysqli, "INSERT INTO factura(VDOCUM, VDOCUMA, VFECHA, VNOMBRE, VRUC, VCAJA, VFACTURA, VORDEN, VPEDIDO, VTRANS, VTC, VMONEDA, VANULADA, VUSUARIO, AGECODIGO, CLICODIGO, DESCODIGO, 
  VENCODIGO, VDESCUENTOS, VTIPRE, VGLOSA, PROFORMA, VDIAS, VENCIMIENTO, TOTALFAC, ICE, DESCUENTOS, OTROS, TOTALLIT, XENTREGAR, VMARCA, DESC1, DESC2, DESC3, DESC4, HORAGRA, FECHAGRA, NO_AUTO, LLAVE_DOS, 
  FECHA_LIMITE, NO_CONTROL, NO_CUENTA, IDCITA, TIPO_PAGO, TIPO_TARJETA, BANCO, BANCO_DCTO, ENTREGADOBS, ENTREGADOUS, CAMBIO, NLOTE, FACTURAEXP, TASACERO, HOJA, ANEXO1, ANEXO2, ANEXO3, ANEXO4, DESPACHO, 
  DESPACHOHORA, ATCBS, ATCUS, TOTALCOBRADO, NITTIPO, ICEADICIONAL)
  VALUES('".$data3['VDOCUM']."','".$data3['VDOCUMA']."','".$data3['VFECHA']."','".$data3['VNOMBRE']."','".$data3['VRUC']."','".$data3['VCAJA']."','".$data3['VFACTURA']."','".$data3['VORDEN']."','".$data3['VPEDIDO']."',
  '".$data3['VTRANS']."','".$data3['VTC']."','".$data3['VMONEDA']."','".$data3['VANULADA']."','".$data3['VUSUARIO']."','".$data3['AGECODIGO']."','".$data3['CLICODIGO']."','".$data3['DESCODIGO']."','".$data3['VENCODIGO']."',
  '".$data3['VDESCUENTOS']."','".$data3['VTIPRE']."','".$data3['VGLOSA']."','".$data3['PROFORMA']."','".$data3['VDIAS']."','".$data3['VENCIMIENTO']."','".$data3['TOTALFAC']."','".$data3['ICE']."','".$data3['DESCUENTOS']."',
  '".$data3['OTROS']."','".$data3['TOTALLIT']."','".$data3['XENTREGAR']."','".$data3['VMARCA']."','".$data3['DESC1']."','".$data3['DESC2']."','".$data3['DESC3']."','".$data3['DESC4']."','".$data3['HORAGRA']."',
  '".$data3['FECHAGRA']."','".$data3['NO_AUTO']."','".$data3['LLAVE_DOS']."','".$data3['FECHA_LIMITE']."','".$data3['NO_CONTROL']."','".$data3['NO_CUENTA']."','".$data3['IDCITA']."',
  '".$data3['TIPO_PAGO']."','".$data3['TIPO_TARJETA']."','".$data3['BANCO']."','".$data3['BANCO_DCTO']."','".$data3['ENTREGADOBS']."','".$data3['ENTREGADOUS']."','".$data3['CAMBIO']."','".$data3['NLOTE']."'
  ,'".$data3['FACTURAEXP']."','".$data3['TASACERO']."','".$data3['HOJA']."','".$data3['ANEXO1']."','".$data3['ANEXO2']."','".$data3['ANEXO3']."','".$data3['ANEXO4']."','".$data3['DESPACHO']."'
  ,'".$data3['DESPACHOHORA']."','".$data3['ATCBS']."','".$data3['ATCUS']."','".$data3['TOTALCOBRADO']."','".$data3['NITTIPO']."','".$data3['ICEADICIONAL']."')")
                                            or die('error: '.mysqli_error($mysqli));    
		}
		
		$query_buscar_detalle = mysqli_query($mysqli, "SELECT * FROM temp_detalle WHERE not exists (SELECT * FROM factura_detalle WHERE temp_detalle.vdocum = factura_detalle.vdocum)") or die('error: '.mysqli_error($mysqli));
		while ($data5 = mysqli_fetch_assoc($query_buscar_detalle)) { 
		
		 $query = mysqli_query($mysqli, "INSERT INTO factura_detalle(VDOCUM, VDOCUMA,AGECODIGO,CLICODIGO,VENCODIGO,DESCODIGO,VFECHA,VTC,VCAJA,VMONEDA,CODIGO,VCANTIDAD,VCANTIDADP,VPREUNIL,VDESCUENTO,VPREUNI,VPESO,COSTOMN,
		 COSTOME,VTIPRE,XENTREGAR,VMARCA,CLOTE,ORDEN,VTRANS,VCANTIDAD1,ICE,TOTAL,ANEXO,DESPACHO,PROFORMA,DESCUENTOCOL) VALUES('".$data5['VDOCUM']."','".$data5['VDOCUMA']."','".$data5['AGECODIGO']."','".$data5['CLICODIGO']."',
		 '".$data5['VENCODIGO']."','".$data5['DESCODIGO']."','".$data5['VFECHA']."','".$data5['VTC']."','".$data5['VCAJA']."','".$data5['VMONEDA']."','".$data5['CODIGO']."','".$data5['VCANTIDAD']."','".$data5['VCANTIDADP']."',
		 '".$data5['VPREUNIL']."','".$data5['VDESCUENTO']."','".$data5['VPREUNI']."','".$data5['VPESO']."','".$data5['COSTOMN']."','".$data5['COSTOME']."','".$data5['VTIPRE']."','".$data5['XENTREGAR']."','".$data5['VMARCA']."',
		 '".$data5['CLOTE']."','".$data5['ORDEN']."','".$data5['VTRANS']."','".$data5['VCANTIDAD1']."','".$data5['ICE']."','".$data5['TOTAL']."','".$data5['ANEXO']."','".$data5['DESPACHO']."','".$data5['PROFORMA']."',
		 '".$data5['PROFORMA']."')") or die('error: '.mysqli_error($mysqli));    
		
		}
		
		
		
		
		
		
		
		
		$row_sisinv = mysqli_num_rows($query_buscar);
		
		$usuario = $_SESSION['username'];
		
		$query_log= mysqli_query($mysqli,"INSERT INTO log_importacion(usuario,fac_importadas) VALUES('".$usuario."','".$row_sisinv."')") or die('error: '.mysqli_error($mysqli));    
		printf("Se migraron  %d Facturas.\n", $row_sisinv, "Facturas");	

  sleep(6);
?>