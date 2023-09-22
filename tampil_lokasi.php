<?php 

header('Content-Type: application/json');
date_default_timezone_set('Asia/Jakarta');
///$tgl=date('Y-m-d');
///$user=$_GET['user'];
include "remote_koneksi.php";
$query = "SELECT * FROM tbl_wilker"; 
$result = mysqli_query($konek, $query); 
$json = array(); 
while($data=mysqli_fetch_assoc($result))
	array_push($json,array('pin'=>$data['wilker']));
						
///echo json_encode(array('users'=>$json));
echo json_encode($json);
?>