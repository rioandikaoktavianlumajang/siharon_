<?php 
session_start();
include "remote_koneksi.php";
if($_POST['k']!=''){
$key =base64_encode($_POST['k']);
///$Username = mysqli_real_escape_string($conn,$_POST["Username"]);
$Username =$_POST["Username"];
///$psw = mysqli_real_escape_string($conn,$_POST["Password"]);
$psw =$_POST["Password"];
$tahune = $_POST["Tahun"];
///    $key=$_POST['k'];

$sql = mysqli_query($konek,"SELECT * from tbl_pegawai WHERE nip='$Username' AND  is_aktif='y'");
?>
<?php 
$sess_id=base64_encode($Username);
$tw =base64_encode($tahune);

?>
<?php
$data=mysqli_fetch_assoc($sql);
$rowcount=mysqli_num_rows($sql);

if (mysqli_num_rows($sql) > 0)
  

 {
        if(password_verify($psw,$data['password'])){
            echo "<script> 
    window.location.href = 'http://icv-klinik.kkpprob.id/adminkkp/load.php?transfer=$sess_id&key=$key&tw=$tw';
        </script>"; 
			    
                 
		}else{
		 echo "<script>
        window.location.href = 'http://icv-klinik.kkpprob.id/adminkkp/login.php';
            </script>";
		}
		

 }

 else {

   echo "<script> 
    window.location.href = 'http://icv-klinik.kkpprob.id/adminkkp/login.php';
        </script>";
 }

}else{
     echo "<script> 
    window.location.href = 'http://icv-klinik.kkpprob.id/adminkkp/login.php';
        </script>";
}

?>
