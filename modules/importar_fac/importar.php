
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script type="text/javascript">
$(document).ready(function() {    
    $('.load').on('click', function(){
		
        //Añadimos la imagen de carga en el contenedor
        $('#animacion').html('<div class="loading"><img src="images/loader.gif"/><br/>Un momento, por favor...</div>');

        $.ajax({
            type: "POST",
            url: "modules/importar_fac/ajax.php",
            success: function(data) {
                //Cargamos finalmente el contenido deseado
                $('#animacion').fadeIn(1000).html(data);
            }
        });
        return false;
    });              
});    
</script>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> IMPORTAR FACTURAS SIMEC
    </h1>
    
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <!-- form start -->
			<center>
		<?php 
		
		
		
		$query = mysqli_query($mysqli, "SELECT * FROM `log_importacion` order by id desc limit 1")
									or die('error'.mysqli_error($mysqli));
									$data  = mysqli_fetch_assoc($query);
		?>
          <table class="table table-bordered">
 			  <tr>
			  	<td>
					
				</td>
				  <td>
				  <b>FECHA ULTIMA IMPORTACION</b>
				  </td>
				  <td align="center">
				  <b>USUARIO</b>
				  </td>
				  <td align="center">
				  <b>Nro FACTURAS</b>
				  </td>
			  </tr>
			   <tr>
			  	<td>
					<button type="button" class="btn btn-primary load">Importar Facturas</button>
				</td>
				   <td>
				   <?php echo $data['fecha']; ?>
				   </td>
				   <td align="center">
				   <?php echo $data['usuario']; ?>
				   </td>
				   <td align="center">
				   <?php echo $data['fac_importadas']; ?>
				   </td>
				 
			  </tr>
		  <div id="animacion" class="col-lg-12">
          
        		</div>
		  </table>
				
				</center>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->

