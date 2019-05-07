<?php 

if ($_SESSION['permisos_acceso']=='Super Admin') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php

  if ($_GET["module"]=="facturas" || $_GET["module"]=="form_medicines") { ?>
    <li class="active">
      <a href="?module=facturas"><i class="fa fa-folder"></i> Datos de Factura </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=facturas"><i class="fa fa-folder"></i> Datos de Factura </a>
      </li>
  <?php
  }


  if ($_GET["module"]=="notas_de_entrega" || $_GET["module"]=="form_notas_de_entrega") { ?>
    <li class="active">
      <a href="?module=notas_de_entrega"><i class="fa fa-clone"></i> Notas de Entrega </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=notas_de_entrega"><i class="fa fa-clone"></i> Notas de Entrega </a>
      </li>
  <?php
  }

	if ($_GET["module"]=="stock_inventory") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Medicamentos </a></li>
        		<li><a href="?module=crear_facturas"><i class="fa fa-circle-o"></i> Registro de medicamentos</a></li>
      		</ul>
    	</li>
    <?php
	}

	elseif ($_GET["module"]=="crear_facturas") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Facturas Completadas </a></li>
        		<li class="active"><a href="?module=crear_facturas"><i class="fa fa-circle-o"></i> Notas de Entrega </a></li>
      		</ul>
    	</li>
    <?php
	}

	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Facturas Completadas </a></li>
        		<li><a href="?module=crear_facturas"><i class="fa fa-circle-o"></i> Notas de Entrega </a></li>
      		</ul>
    	</li>
    <?php
	}
   /*****************************/
   if ($_GET["module"]=="modulo_facturas") { ?>
		
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Facturas</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Importar Facturas </a></li>
        		<li><a href="?module=crear_facturas"><i class="fa fa-circle-o"></i> Registrar Facturas</a></li>
      		</ul>
    	</li>
    <?php
	}

	elseif ($_GET["module"]=="modulo_facturas") { ?>
		
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Facturas</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Facturas completas </a></li>
        		<li class="active"><a href="?module=crear_facturas"><i class="fa fa-circle-o"></i> Notas de Pedido </a></li>
      		</ul>
    	</li>
    <?php
	}

	else { ?>
		
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Facturas</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=importar_fac"><i class="fa fa-circle-o"></i> Importar Facturas </a></li>
        		<li><a href="?module=crear_facturas"><i class="fa fa-circle-o"></i> Registrar Factura </a></li>
      		</ul>
    	</li>
    <?php
	}
   
   /*********************************/

	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Administrar usuarios</a>
	  	</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Administrar usuarios</a>
	  	</li>
	<?php
	}


	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>

<?php
}

elseif ($_SESSION['permisos_acceso']=='Gerente') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { ?>
		<li class="active">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}


  if ($_GET["module"]=="stock_inventory") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Medicamentos</a></li>
            <li><a href="?module=crear_facturas"><i class="fa fa-circle-o"></i> Registro de medicamentos </a></li>
          </ul>
      </li>
    <?php
  }
  elseif ($_GET["module"]=="crear_facturas") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Medicamentos </a></li>
            <li class="active"><a href="?module=crear_facturas"><i class="fa fa-circle-o"></i> Registro de medicamentos </a></li>
          </ul>
      </li>
    <?php
  }
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i>  Stock de Medicamentos </a></li>
            <li><a href="?module=crear_facturas"><i class="fa fa-circle-o"></i> Registro de medicamentos </a></li>
          </ul>
      </li>
    <?php
  }

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
if ($_SESSION['permisos_acceso']=='Almacen') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

  if ($_GET["module"]=="start") { ?>
    <li class="active">
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="medicines" || $_GET["module"]=="form_medicines") { ?>
    <li class="active">
      <a href="?module=medicines"><i class="fa fa-folder"></i> Datos de medicamentos </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=medicines"><i class="fa fa-folder"></i> Datos de medicamentos </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="medicines_transaction" || $_GET["module"]=="form_medicines_transaction") { ?>
    <li class="active">
      <a href="?module=medicines_transaction"><i class="fa fa-clone"></i> Registro de medicamentos </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=medicines_transaction"><i class="fa fa-clone"></i> Registro de medicamentos </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="stock_inventory") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Medicamentos </a></li>
            <li><a href="?module=crear_facturas"><i class="fa fa-circle-o"></i> Registro de medicamentos </a></li>
          </ul>
      </li>
    <?php
  }
  elseif ($_GET["module"]=="crear_facturas") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Medicamentos </a></li>
            <li class="active"><a href="?module=crear_facturas"><i class="fa fa-circle-o"></i> Registro de medicamentos </a></li>
          </ul>
      </li>
    <?php
  }
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Medicamentos </a></li>
            <li><a href="?module=crear_facturas"><i class="fa fa-circle-o"></i> Registro de medicamentos </a></li>
          </ul>
      </li>
    <?php
  }

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
?>