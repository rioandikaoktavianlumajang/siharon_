<?php 
date_default_timezone_set('Asia/Jakarta');
include "remote_koneksi.php";
/*
 * Written By: Taifun
 * using parts from the "Web2SQL example" from ShivalWolf
 * and parts from the "POST any local file to a php server example" from Scott
 *
 * Date: 2013/Mar/05
 * Contact: info@puravidaapps.com
 *
 * Version 2: 'dirname(__FILE__)' added to avoid problems finding the complete path to the script
 */

/************************************CONFIG****************************************/

$nip=$_GET['nip'];
$tgl=date('Y-m-d');
$nama=$_GET['nama'];
$waktu=date('H:i:s');
$bergejala=$_GET['bergejala'];
$gejala_ili=$_GET['gejala_ili'];


     $query = "INSERT INTO tbl_ili(nip,nama,waktu,tanggal,bergejala,gejala_ili) values('$nip','$nama','$waktu','$tgl','$bergejala','$gejala_ili')";
         $status=mysqli_query($konek,$query);
         
                 if($status){
                echo "Berhasil Rekam ILI";    
                }else{
                echo "Gagal Rekam ILI";     
                }
    
  
        
       
        


?>