<?php
require_once "config/database.php";
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	if ($_GET['module'] == 'start') {
		include "modules/start/view.php";
	}

	elseif ($_GET['module'] == 'facturas') {
		include "modules/facturas/view.php";
	}

	elseif ($_GET['module'] == 'facturas_detalle') {
		include "modules/facturas/detalle.php";
	}
	

	elseif ($_GET['module'] == 'notas_de_entrega') {
		include "modules/notas_de_entrega/view.php";
	}

	elseif ($_GET['module'] == 'nota_de_pedido_ingreso') {
		include "modules/notas_de_entrega/form.php";
	}
	
	elseif ($_GET['module'] == 'notas_de_entrega_proses') {
		include "modules/notas_de_entrega/proses.php";
	}
	elseif ($_GET['module'] == 'nota_de_entrega_multi_fac') {
		include "modules/nota_de_entrega_multi_fac/proses.php";
	}
	

	elseif ($_GET['module'] == 'stock_inventory') {
		include "modules/stock_inventory/view.php";
	}

	elseif ($_GET['module'] == 'crear_facturas') {
		include "modules/crear_facturas/proses.php";
	}

	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}


	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}

	elseif ($_GET['module'] == 'profile') {
		include "modules/profile/view.php";
		}


	elseif ($_GET['module'] == 'form_profile') {
		include "modules/profile/form.php";
	}

	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
	elseif ($_GET['module'] == 'importar_fac') {
		include "modules/importar_fac/importar.php";
	}
}
?>