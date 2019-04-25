
<?php
session_start();


require_once "../../config/database.php";

if(isset($_POST['dataidobat'])) {
	$codigo = $_POST['dataidobat'];

 
  $query = mysqli_query($mysqli, "SELECT VDOCUMA, VNOMBRE FROM  factura  where CLICODIGO like '$codigo'")
                                  or die('errores '.mysqli_error($mysqli));


  

 $row_cnt = mysqli_num_rows($query);

	if($row_cnt != '') {
		echo "<select class='chosen-select' id='cod_factura_id' name='codigo_factura' data-placeholder='-- Seleccionar Factura --' autocomplete='off' required>";
		 while ($data_obat = mysqli_fetch_assoc($query)) {
        echo"<option value=".$data_obat["VDOCUMA"]."> ".$data_obat["VDOCUMA"]." | ".utf8_encode($data_obat["VNOMBRE"])."</option>";
                      }
         echo "</select>";          
                 
               
	} else {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Stock</label>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <input type='text' class='form-control' id='stok' name='stock' value='No se encontraron facturas' readonly>
                   
                  </div>
                </div>
              </div>";
	}		
}
?> 