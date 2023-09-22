<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Excel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user_level') == '') {
            redirect('Auth');
        }
        $this->load->model("Crud_model");
    }

    public function cetak_baru()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");
        include "application/views/cetak_excel.php";
    }

    public function excel($nip)
    {
        $data['nip'] = $nip;
        $this->load->view('cetak/excel.php', $data);
    }

    public function cetak_berdasarkan_speriode($tgl_mulai, $tgl_sampai)
    {
        echo $tgl_mulai . '-' . $tgl_sampai;
    }

    function cetak_berdasarkan_periode($mulai, $sampai)
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Rio Andika Oktavian')
            ->setLastModifiedBy('Saya Rio')
            ->setTitle("Rekap Absensi")
            ->setSubject("Rekam Kehadiran")
            ->setDescription("Laporan Semua Data Pegawai")
            ->setKeywords("Data Rekam");

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DAFTAR ABSENSI PEGAWAI KANTOR KESEHATAN PELABUHAN KELAS II PROBOLINGGO"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:J1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $excel->setActiveSheetIndex(0)->setCellValue('A2', "BULAN ..."); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A2:J2'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // $excel->setActiveSheetIndex(0)->setCellValue('A4', "NAMA : " . trim($nama)); // Set kolom A1 dengan tulisan "DATA SISWA"
        // $excel->getActiveSheet()->mergeCells('A4:J4'); // Set Merge Cell pada kolom A1 sampai E1
        // $excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE); // Set bold kolom A1
        // $excel->getActiveSheet()->getStyle('A4')->getFont()->setSize(13); // Set font size 15 untuk kolom A1

        // $excel->setActiveSheetIndex(0)->setCellValue('A5', "NIP : " . trim($nip)); // Set kolom A1 dengan tulisan "DATA SISWA"
        // $excel->getActiveSheet()->mergeCells('A5:J5'); // Set Merge Cell pada kolom A1 sampai E1
        // $excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE); // Set bold kolom A1
        // $excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(13); // Set font size 15 untuk kolom A1

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $siswa = $this->Crud_model->tampil_data("t_absensi")->result();
        // $siswa = $this->db->query("SELECT * FROM t_absensi WHERE tgl_hadir BETWEEN $mulai AND $sampai")->result();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 7; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
            $excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, date('l', strtotime($data->tgl_hadir)));
            $excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, date('d-m-y', strtotime($data->tgl_hadir)));
            $excel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->time_datang);
            $excel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->time_pulang);
            $excel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->time_pulang);
            $excel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->time_pulang);
            $excel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->time_pulang);

            $excel->setActiveSheetIndex(0)->setCellValue('A7', "NO"); // Set kolom A3 dengan tulisan "NO"
            $excel->getActiveSheet()->getStyle('A7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('B7', "HARI"); // Set kolom B3 dengan tulisan "NIS"
            $excel->getActiveSheet()->getStyle('B7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('C7', "TANGGAL"); // Set kolom C3 dengan tulisan "NAMA"
            $excel->getActiveSheet()->getStyle('C7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('D7', "DATANG"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->getActiveSheet()->getStyle('D7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('E7', "PULANG"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->getActiveSheet()->getStyle('E7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('F7', "DATANG TERLAMBAT"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->getActiveSheet()->getStyle('F7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('G7', "PULANG LEBIH CEPAT"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->getActiveSheet()->getStyle('G7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('H7', "KETERANGAN"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(TRUE);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        $siswa = $this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $nip))->result();
        foreach ($siswa as $data_pegawai) { // Lakukan looping pada variabel siswa
            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("" . $data_pegawai->nama_pegawai);
            $excel->setActiveSheetIndex(0);
        }

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Rekap Absensi.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    public function index($nip)
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Rio Andika Oktavian')
            ->setLastModifiedBy('Saya Rio')
            ->setTitle("Rekap Absensi")
            ->setSubject("Rekam Kehadiran")
            ->setDescription("Laporan Semua Data Pegawai")
            ->setKeywords("Data Rekam");

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "REKAP KEHADIRAN PEGAWAI KANTOR KESEHATAN PELABUHAN KELAS II PROBOLINGGO"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:J1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $excel->setActiveSheetIndex(0)->setCellValue('A2', "BULAN APRIL"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A2:J2'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // $siswa = $this->db->query("SELECT * FROM t_absensi WHERE 'nip_no_kontrak' = $nip && tgl_hadir BETWEEN '2021-04-01' AND '2021-04-30'")->result();
        $siswa = $this->db->query("SELECT * FROM `t_absensi` WHERE YEAR(tgl_hadir)='2023' AND MONTH(tgl_hadir)='05' ")->result();
        // $siswa = $this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $nip))->result();
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A4', "NAMA : " . $data->nama_pegawai); // Set kolom A1 dengan tulisan "DATA SISWA"
        }
        $excel->getActiveSheet()->mergeCells('A4:J4'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A4')->getFont()->setSize(13); // Set font size 15 untuk kolom A1

        $excel->setActiveSheetIndex(0)->setCellValue('A5', "NIP : " . trim($nip)); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A5:J5'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(13); // Set font size 15 untuk kolom A1

        $siswa = $this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $nip))->result();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
            $excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, date('l', strtotime($data->tgl_hadir)));
            $excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, date('d-m-y', strtotime($data->tgl_hadir)));
            $excel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->time_datang);
            $excel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->time_pulang);
            $excel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->telat);
            $excel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->jam_penggantu_telat);
            $excel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->izin);
            $excel->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->dinas_luar);
            $excel->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->keterangan);

            $excel->setActiveSheetIndex(0)->setCellValue('A7', "NO"); // Set kolom A3 dengan tulisan "NO"
            $excel->getActiveSheet()->getStyle('A7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('B7', "HARI"); // Set kolom B3 dengan tulisan "NIS"
            $excel->getActiveSheet()->getStyle('B7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('C7', "TANGGAL"); // Set kolom C3 dengan tulisan "NAMA"
            $excel->getActiveSheet()->getStyle('C7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('D7', "DATANG"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->getActiveSheet()->getStyle('D7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('E7', "PULANG"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->getActiveSheet()->getStyle('E7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('F7', "DATANG TERLAMBAT"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->getActiveSheet()->getStyle('F7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('G7', "PULANG LEBIH CEPAT"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->getActiveSheet()->getStyle('G7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('H7', "IZIN"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('I7', "DINAS LUAR"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->getActiveSheet()->getStyle('I7')->getFont()->setBold(TRUE);
            $excel->setActiveSheetIndex(0)->setCellValue('J7', "KETERANGAN"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->getActiveSheet()->getStyle('J7')->getFont()->setBold(TRUE);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        $siswa = $this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $nip))->result();
        foreach ($siswa as $data_pegawai) { // Lakukan looping pada variabel siswa
            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("" . $data_pegawai->nama_pegawai);
            $excel->setActiveSheetIndex(0);
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment; filename="Data Siswa.xlsx"');

        $siswa = $this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $nip))->result();
        foreach ($siswa as $data) {
            header('Content-Disposition: attachment; filename=' . $data->nama_pegawai . '/' . $data->nip_no_kontrak . ' Bulan April.xlsx"'); // Set nama file excel nya
        }

        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
}
