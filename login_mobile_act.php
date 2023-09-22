<?php

//date_default_timezone_set('Asia/Jakarta');
///$sql = mysqli_query($konek,"SELECT * from tbl_pegawai WHERE nip='$user_id' AND password=md5('$psw') and is_aktif='y'");
///password_verify($_POST['password'], $user['password'])

include 'remote_koneksi.php';

$user_id = mysqli_real_escape_string($konek, $_GET['user_id']);
$psw = mysqli_real_escape_string($konek, $_GET['psw']);

$cekuser = mysqli_query($konek,"SELECT * from tbl_pegawai WHERE nip='$user_id' AND  is_aktif='y'");



$sql = mysqli_query($konek,"SELECT * from tbl_pegawai WHERE nip='$user_id' AND  is_aktif='y'");


$data=mysqli_fetch_assoc($cekuser);


if (mysqli_num_rows($sql) > 0)
  

 {
        if(password_verify($psw,$data['password'])){
            echo $data['foto'];
		//	echo "log in ok";
		}else{
			echo "Log in Error";
		}
		

 }

 else {

     echo "Log in Error";

 }

 //mysqli_close($dbc);

?>