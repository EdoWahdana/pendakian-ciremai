<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_order");
    }

    public function cetak_laporan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        // Ambil data order berdasarkan inputan view laporan       
        $orders = $this->m_order->get_order_by_periode($this->input->post('bulan'), $this->input->post('tahun'));

        // Buat array untuk header di excel
        $header = [
                    'ID', 
                    'Nama', 
                    'Tanggal Lahir', 
                    'Alamat', 
                    'JK', 
                    'Jenis Identitas', 
                    'No. Identitas', 
                    'No.HP', 
                    'Email', 
                    'Kode Order', 
                    'Tanggal Naik', 
                    'Tanggal Turun', 
                    'Harga', 
                    'Status', 
                    'Bukti Pembayaran'
                ];

        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0);
        $spreadsheet->getActiveSheet()->fromArray($header);
        $activeSheet = $spreadsheet->getActiveSheet();
        
        // Set zoom level
        $activeSheet->getSheetView()->setZoomScale(80);

        // Set width column
        $activeSheet->getDefaultColumnDimension()->setWidth(30);
        $activeSheet->getColumnDimension('A')->setWidth(5);     // Kolom ID
        $activeSheet->getColumnDimension('B')->setWidth(20);    // Kolom nama
        $activeSheet->getColumnDimension('C')->setWidth(15);    // Kolom tanggal lahir
        $activeSheet->getColumnDimension('D')->setWidth(30);    // Kolom alamat
        $activeSheet->getColumnDimension('E')->setWidth(5);     // Kolom jk
        $activeSheet->getColumnDimension('F')->setWidth(10);    // Kolom jenis identitas
        $activeSheet->getColumnDimension('G')->setWidth(20);    // Kolom no identitas
        $activeSheet->getColumnDimension('H')->setWidth(20);    // Kolom no hp
        $activeSheet->getColumnDimension('I')->setWidth(20);    // Kolom email
        $activeSheet->getColumnDimension('J')->setWidth(20);    // Kolom kode order
        $activeSheet->getColumnDimension('K')->setWidth(15);    // Kolom tanggal naik
        $activeSheet->getColumnDimension('L')->setWidth(15);    // Kolom tangga turun
        $activeSheet->getColumnDimension('M')->setWidth(20);    // Kolom Harga
        $activeSheet->getColumnDimension('N')->setWidth(40);    // Kolom status
        $activeSheet->getColumnDimension('O')->setWidth(40);    // Kolom bukti pembayaran

        // Style untuk header tabel
        $headerStyle = [
            'font' => [
                'bold' => true
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
            ],
            'borders' => [
                'allborders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $activeSheet->getStyle('A1:O1')->applyFromArray($headerStyle);
        $activeSheet->getStyle('A1')->getAlignment()->setWrapText(TRUE);
        $activeSheet->getStyle('E1')->getAlignment()->setWrapText(TRUE);

        
        // Perulangan untuk mengisi cell dari hasil query database
        $count = 2;
        foreach($orders as $order) {
            // Lakukan pengecekan kondisi untuk kolom status pesanan
            switch ($order['status_order']) {
                case 0 : $status = "Belum melakukan pembayaran"; break;
                case 1 : $status = "Pesanan dikonfirmasi"; break;
                case 2 : $status = "Pesanan ditolak"; break;
            }

            $spreadsheet->getActiveSheet()->fromArray([
                $order['id_order'], 
                $order['nama'], 
                $order['tanggal_lahir'], 
                $order['alamat'], 
                $order['jk'],
                $order['jenis_identitas'],
                $order['no_identitas'],
                $order['no_handphone'],
                $order['email'],
                $order['kode_order'],
                $order['tanggal_naik'],
                $order['tanggal_turun'],
                $order['harga'],
                $status,
                $order['bukti_pembayaran']
            ], null, 'A'.$count);
            $activeSheet->getStyle('G'.$count)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadSheet\Style\NumberFormat::FORMAT_NUMBER);
            $count++;
        }

        // Buat file excel 
        $writer = new Xlsx($spreadsheet);

        $filename = "Laporan $bulan $tahun";

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    
}