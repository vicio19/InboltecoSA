<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Listado de Notas de Enterga

    <a class="btn btn-primary btn-social pull-right" href="?module=nota_de_pedido_ingreso" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar
    </a>
  </h1>

</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  

    if (empty($_GET['alert'])) {
      echo "";
    } 
  
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Nuevos datos de medicamentos ha sido  almacenado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos del Medicamento modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos del Medicamento
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Fecha</th>
                <th class="center">Nombre</th>
                <th class="center">Nit</th>
                <th class="center">Caja</th>
                
                <th class="center">Usuario</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
          
            $query = mysqli_query($mysqli, "SELECT * FROM profor ORDER BY VDOCUM DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
            /*  $precio_compra = format_rupiah($data['precio_compra']);
				$precio_venta = format_rupiah($data['precio_venta']);
			 */
           
              echo "<tr>
                      <td width='30' class='center'>$data[VDOCUM]</td>
                      <td width='80' class='center'>$data[VFECHA]</td>
                      <td width='180'>$data[VNOMBRE]</td>
                      <td width='100' align='right'>$data[VRUC]</td>
					   <td width='80' align='right'>$data[VCAJA]</td>
                     
                     
                      <td width='80' class='center'>$data[VUSUARIO]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_medicines&form=edit&id=$data[VDOCUM]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/medicines/proses.php?act=delete&id=<?php echo $data['VDOCUM'];?>" onclick="return confirm('estas seguro de eliminar<?php echo $data['VDOCUM']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
             
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content