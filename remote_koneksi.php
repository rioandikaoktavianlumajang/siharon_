<?php
	
///$konek = mysqli_connect("localhost", "kkpprobo_kampret", "*kespel#", "kkpprobo_dbsimkespel");

$konek = mysqli_connect("localhost", "u8869238_admin", "123probolinggo", "u8869238_dbsiharon");
	
if(mysqli_connect_errno()){
	printf ("Koneksi Pedot Bro... Gak Onok Sinyal.. : ".mysqli_connect_error());
	exit();
}
	
?>