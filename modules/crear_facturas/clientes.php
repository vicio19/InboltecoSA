<?php

session_start();



if (isset($_GET['term'])){
	# conectare la base de datos
    require_once "../../config/database.php";
	
$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($mysqli2)
{
	$fetch = mysqli_query($mysqli2,"SELECT * FROM clientes where CLICODIGO like '%" . mysqli_real_escape_string($mysqli2,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_producto=$row['CLICODIGO'];
		$precio=$row['CLIRUC'];
		$row_array['value'] = $row['CLICODIGO']." | ".$row['CLINOMBRES'];
		$row_array['CLICODIGO']=$row['CLICODIGO'];
		
		$row_array['codigo']=$row['CLICODIGO'];
		$row_array['descripcion']=$row['CLINOMBRES'];
		$row_array['precio']=$precio;
		array_push($return_arr,$row_array);
    }
}

/* Cierra la conexión. */
mysqli_close($mysqli2);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>