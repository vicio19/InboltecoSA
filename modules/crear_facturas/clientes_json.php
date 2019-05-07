<?php
// connect to database
		
 $con=@mysqli_connect("localhost", root, , "test_factura");
$search = strip_tags(trim($_GET['q'])); 
// Do Prepared Query
$query = mysqli_query($con, "SELECT * FROM clientes WHERE nombre LIKE '%$search%' LIMIT 40");
// Do a quick fetchall on the results
$list = array();
while ($list=mysqli_fetch_array($query)){
	$data[] = array('id' => $list['id'], 'text' => $list['nombre'],'email' => $list['email'],'telefono' => $list['telefono'],'direccion' => $list['direccion']);
}
// return the result in json
echo json_encode($data);
?>