
<script type="text/javascript">
  
  function tampil_obat(input){
    var num = input.value;

    $.post("modules/notas_de_entrega/buscar_facturas.php", {
      dataidobat: num,
    }, function(response) {      
      $('#stok').html(response)

     
    });
  }  

  function cambiar_var(input) {
	  
	status=!status;	
	document.f1.other_text.disabled = status;
    var vari_id= document.getElementById("input").checked;
	 alert(vari_id);
    
  }

  function hitung_total_stok() {
    bil1 = document.formObatMasuk.stok.value;
    bil2 = document.formObatMasuk.jumlah_masuk.value;
	tt = document.formObatMasuk.transaccion.value;
	
    if (bil2 == "") {
      var hasil = "";
    }
    else {
      var salida = eval(bil1) - eval(bil2);
	  var hasil = eval(bil1) + eval(bil2);
    }

	if (tt=="Salida"){
		document.formObatMasuk.total_stok.value = (salida);
	}	else {
		document.formObatMasuk.total_stok.value = (hasil);
	} 
    
  }
   function toggle(elemento) {
          if(elemento.value=="1") {
              document.getElementById("stok").style.display = "block";
             
           }else{
               
                  
                   document.getElementById("stok").style.display = "none";
              
                   
                
            }
		}
</script>



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
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="" method="Get" name="formObatMasuk">
            <div class="box-body">
              <?php  
            
              $query_id = mysqli_query($mysqli, "SELECT VDOCUM as codigo FROM profor
                                                ORDER BY VDOCUM DESC LIMIT 1")
                                                or die('Error : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                 
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo    = $data_id['codigo']+1;
              } else {
                  $codigo = 10000001;
              }

             
             
              ?>
			 <input type="hidden" name="module" value="notas_de_entrega_proses">		
			 <input type="hidden" name="act" value="insert">		
			 
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo de Nota de Entrega </label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo_transaccion" value="<?php echo $codigo; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="fecha_a" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                </div>
              </div>

              <hr>

              <div class="form-group">  
                <label class="col-sm-2 control-label">Codigo de Cliente</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="codigo_user" data-placeholder="-- Seleccionar Cliente --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT CLICODIGO, VNOMBRE FROM  factura group by VNOMBRE ORDER BY factura.VNOMBRE  ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=".$data_obat["CLICODIGO"]."> ".$data_obat["CLICODIGO"]." | ".utf8_encode($data_obat["VNOMBRE"])."</option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
			 <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Factura</label>
                <div class="col-sm-5">
                 <label class="radio-inline"><input id="una_fac" type="radio" name="optradio" checked  onclick="toggle(this)" value="1">1 Sola Factura</label>
                </div>
              </div>
			  <div class='form-group'>  
                <label class='col-sm-2 control-label'>Codigo de Factura</label>
                <div class='col-sm-5'>
				
			    <span id='stok'>
			   
			  </span>
			
			  </div>
			  </div>
			  
			   <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-5">
                 <label class="radio-inline"><input id="varias_fac" type="radio" name="optradio" onclick="toggle(this)" value="2" >Varias Facturas</label>
                </div>
              </div>

           
              
			<!--   ***********************************************************************************   -->
			
		
 

			
			
			
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Crear">
                  <a href="?module=notas_de_entrega" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
