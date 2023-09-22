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

    function cetak_berdasarkan_tanggal()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Rio Andika Oktavian')
            ->setLastModifiedBy('Saya Rio')
            ->setTitle("Rekap")
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
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $excel->setActiveSheetIndex(0)->setCellValue('A2', "BULAN ..."); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A2:J2'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $excel->setActiveSheetIndex(0)->setCellValue('A4', "Nama"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A4')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $excel->setActiveSheetIndex(0)->setCellValue('A5', "Nama"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A5')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $excel->setActiveSheetIndex(0)->setCellValue('B4', ":"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->getStyle('B4')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('B4')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT); // Set text center untuk kolom A1

        $excel->setActiveSheetIndex(0)->setCellValue('B5', ":"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->getStyle('B5')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('B5')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT); // Set text center untuk kolom A1

        $excel->setActiveSheetIndex(0)->setCellValue('C4', "*Nama pegawai"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->getStyle('C4')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('C4')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT); // Set text center untuk kolom A1

        $excel->setActiveSheetIndex(0)->setCellValue('C5', "*Nama pegawai"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->getStyle('C5')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('C5')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A7', "No"); // Set kolom A3 dengan tulisan "NO"
        $excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(TRUE);
        $excel->setActiveSheetIndex(0)->setCellValue('B7', "Hari"); // Set kolom B3 dengan tulisan "NIS"
        $excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(TRUE);
        $excel->setActiveSheetIndex(0)->setCellValue('C7', "Tanggal"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(TRUE);
        $excel->setActiveSheetIndex(0)->setCellValue('D7', "Datang"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(TRUE);
        $excel->setActiveSheetIndex(0)->setCellValue('E7', "Pulang"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(TRUE);
        $excel->setActiveSheetIndex(0)->setCellValue('F7', "Datang Terlambat"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(TRUE);
        $excel->setActiveSheetIndex(0)->setCellValue('G7', "Pulang Lebih Cepat"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(TRUE);
        $excel->setActiveSheetIndex(0)->setCellValue('H7', "Keterangan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->getActiveSheet()->getStyle('H7')->getFont()->setBold(TRUE);

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A7')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B7')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C7')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D7')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E7')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F7')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G7')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H7')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        // select_where_dashboard($field, $table, $where)
        $siswa = $this->Crud_model->select_between("tgl_hadir", "t_absensi", $_POST['mulai'], $_POST['sampai'])->result();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 8; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->nip_no_kontrak);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->tgl_hadir);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->time_datang);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->time_pulang);
            // if ($data->time_pulang=='00:00:00') {
            //     echo 'kosong';
            // }else {
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->time_pulang);
            // }
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->time_pulang);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->keterangan);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
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

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Rekap Absensi $nip");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Rekap Absensi.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    public function index()
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
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $excel->setActiveSheetIndex(0)->setCellValue('A2', "BULAN ..."); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A2:J2'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $excel->setActiveSheetIndex(0)->setCellValue('A4', "Nama"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:J1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(11); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
        $excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(22); // Set font size 15 untuk kolom A1
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "Hari"); // Set kolom B3 dengan tulisan "NIS"
        $excel->getActiveSheet()->getStyle('B3')->getFont()->setBold(TRUE);
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "Tanggal"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->getActiveSheet()->getStyle('C3')->getFont()->setBold(TRUE);
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "Datang"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->getActiveSheet()->getStyle('D3')->getFont()->setBold(TRUE);
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "Pulang"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->getActiveSheet()->getStyle('E3')->getFont()->setBold(TRUE);
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "Datang Terlambat"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->getActiveSheet()->getStyle('F3')->getFont()->setBold(TRUE);
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "Pulang Lebih Cepat"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->getActiveSheet()->getStyle('G3')->getFont()->setBold(TRUE);
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "Keterangan"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->getActiveSheet()->getStyle('H3')->getFont()->setBold(TRUE);

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $siswa = $this->Crud_model->tampil_data("t_absensi")->result();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->tgl_hadir);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->tgl_hadir);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->time_datang);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->time_pulang);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->time_pulang);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->time_pulang);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->time_pulang);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
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

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Rekap Absensi");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Rekap Absensi.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
}
