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
        $activeSheet->getColumnDimension('A')->setWidth(5);
        $activeSheet->getColumnDimension('B')->setWidth(20);
        $activeSheet->getColumnDimension('C')->setWidth(30);
        $activeSheet->getColumnDimension('D')->setWidth(5);
        $activeSheet->getColumnDimension('E')->setWidth(10);
        $activeSheet->getColumnDimension('F')->setWidth(20);
        $activeSheet->getColumnDimension('G')->setWidth(15);
        $activeSheet->getColumnDimension('H')->setWidth(20);
        $activeSheet->getColumnDimension('I')->setWidth(20);
        $activeSheet->getColumnDimension('J')->setWidth(15);
        $activeSheet->getColumnDimension('K')->setWidth(15);
        $activeSheet->getColumnDimension('L')->setWidth(10);
        $activeSheet->getColumnDimension('M')->setWidth(40);

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
        $activeSheet->getStyle('A1:M1')->applyFromArray($headerStyle);
        $activeSheet->getStyle('A1')->getAlignment()->setWrapText(TRUE);
        $activeSheet->getStyle('E1')->getAlignment()->setWrapText(TRUE);

        // Perulangan untuk mengisi cell dari hasil query database
        $count = 2;
        foreach($orders as $order) {
            $spreadsheet->getActiveSheet()->fromArray([
                $order['id_order'], 
                $order['nama'], 
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
                $order['bukti_pembayaran']
            ], null, 'A'.$count);
            $activeSheet->getStyle('F'.$count)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadSheet\Style\NumberFormat::FORMAT_NUMBER);
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