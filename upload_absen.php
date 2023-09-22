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

//SETTINGS//
//This code is something you set in the APP so random people cant use it.
$ACCESSKEY="secret";
$kode=$_GET['kode'];
$tgl=date('Y-m-d');

//$tgl='2099-01-01';

$thn=date('Y',strtotime($tgl));
$lokasi=$_GET['lokasi'];
$filename = $_GET['filename'];
$waktu=date('H:i:s');
$user=$_GET['user'];
$nama=$_GET['nama'];

if($_GET['p']==$ACCESSKEY){
         $cek=mysqli_query ($konek, "SELECT * FROM t_absensi WHERE nip_no_kontrak='$user' and tgl_hadir='$tgl'");
            $xxx=mysqli_num_rows($cek);
            if($xxx>0){
            $query="UPDATE t_absensi set time_pulang='$waktu',file_pulang='$filename' where nip_no_kontrak='$user' and tgl_hadir='$tgl'
    ";
      
        $status= mysqli_query($konek,$query);
         
                if($status){
                echo "Berhasil Rekam Kehadiran Pulang";    
                }else{
                echo "Gagal Rekam Kehadiran Pulang";     
                }
    }else{
        
     $query = "INSERT INTO t_absensi(tgl_hadir,time_datang,nip_no_kontrak,file_datang,nama_pegawai,wilker,telat) values('$tgl','$waktu','$user','$filename','$nama','$lokasi',if(TIMEDIFF('$waktu','07:30:00')<'00:00:01','00:00:00',TIMEDIFF('$waktu','07:30:00')))";
         $status=mysqli_query($konek,$query);
         
                 if($status){
                echo "Berhasil Rekam Kehadiran Datang Kerja";    
                }else{
                echo "Gagal Rekam Kehadiran Datang Kerja";     
                }
    
    }
}else{
    echo "Hak Otorisasi Rekam Kehadiran Tidak Valid!";  
}

        
       
        


?>