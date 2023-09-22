<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; Rekap Absensi.xls");
?>

<h3>Data Siswa</h3>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>NIS</th>
    </tr>
    <?php
    // Buat query untuk menampilkan semua data siswa
    $absensi = $this->db->query("SELECT * FROM t_absensi WHERE nip_no_kontrak = $nip")->result();

    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    // while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
    foreach ($absensi as $data_absensi) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . $data_absensi->nip_no_kontrak . "</td>";
        echo "</tr>";

        $no++; // Tambah 1 setiap kali looping
    }
    ?>
</table>