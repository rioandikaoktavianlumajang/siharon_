<?php 

header('Content-Type: application/json');
date_default_timezone_set('Asia/Jakarta');
$tgl=date('Y-m-d');
$user=$_GET['user'];
include "remote_koneksi.php";
$query = "SELECT * FROM t_absensi WHERE tgl_hadir= '$tgl' and nip_no_kontrak='$user'"; 
$result = mysqli_query($konek, $query); 
$json = array(); 
while($data=mysqli_fetch_assoc($result))
	array_push($json,array('pin'=>$data['pin'],
							'datang'=>$data['time_datang'],
							'pulang'=>$data['time_pulang']));
						
///echo json_encode(array('users'=>$json));
echo json_encode($json);
?>