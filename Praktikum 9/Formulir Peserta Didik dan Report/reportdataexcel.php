<?php
include 'koneksi.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Tanggal Daftar');
$sheet->setCellValue('C1', 'Jenis Pendaftaran');
$sheet->setCellValue('D1', 'Tanggal Masuk');
$sheet->setCellValue('E1', 'NIS');
$sheet->setCellValue('F1', 'No Peserta');
$sheet->setCellValue('G1', 'PAUD');
$sheet->setCellValue('H1', 'TK');
$sheet->setCellValue('I1', 'No SKHUN');
$sheet->setCellValue('J1', 'No Ijazah');
$sheet->setCellValue('K1', 'Hobi');
$sheet->setCellValue('L1', 'Cita-cita');
$sheet->setCellValue('M1', 'Nama Lengkap');
$sheet->setCellValue('N1', 'Jenis Kelamin');
$sheet->setCellValue('O1', 'NISN');
$sheet->setCellValue('P1', 'NIK');
$sheet->setCellValue('Q1', 'Tempat Lahir');
$sheet->setCellValue('R1', 'Tanggal Lahir');
$sheet->setCellValue('S1', 'Agama');
$sheet->setCellValue('T1', 'Berkebutuhan Khusus');
$sheet->setCellValue('U1', 'Alamat Jalan');
$sheet->setCellValue('V1', 'RT');
$sheet->setCellValue('W1', 'RW');
$sheet->setCellValue('X1', 'Nama Dusun');
$sheet->setCellValue('Y1', 'Nama Kelurahan/Desa');
$sheet->setCellValue('Z1', 'Kecamatan');

$query = mysqli_query($koneksi, "SELECT * FROM biodata");

$i = 2;
$no = 1;

while ($row = mysqli_fetch_array($query)) {
    $sheet->setCellValue('A' . $i, $no++);
    $sheet->setCellValue('B' . $i, $row['tanggalisiformulir']);
    $sheet->setCellValue('C' . $i, $row['jenispendaftaran']);
    $sheet->setCellValue('D' . $i, $row['tanggalmasuk']);
    $sheet->setCellValue('E' . $i, $row['nis']);
    $sheet->setCellValue('F' . $i, $row['nomorpendaftaran']);
    $sheet->setCellValue('G' . $i, $row['paud']);
    $sheet->setCellValue('H' . $i, $row['tk']);
    $sheet->setCellValue('I' . $i, $row['skhun']);
    $sheet->setCellValue('J' . $i, $row['ijazah']);
    $sheet->setCellValue('K' . $i, $row['hobi']);
    $sheet->setCellValue('L' . $i, $row['cita']);
    //$sheet->setCellValue('M' . $i, $no++);
    $sheet->setCellValue('M' . $i, $row['nama']);
    $sheet->setCellValue('N' . $i, $row['kelamin']);
    $sheet->setCellValue('O' . $i, $row['nisn']);
    $sheet->setCellValue('P' . $i, $row['nik']);
    $sheet->setCellValue('Q' . $i, $row['tempatlahir']);
    $sheet->setCellValue('R' . $i, $row['tanggallahir']);
    $sheet->setCellValue('S' . $i, $row['agama']);
    $sheet->setCellValue('T' . $i, $row['kebutuhankhusus']);
    $sheet->setCellValue('U' . $i, $row['alamat']);
    $sheet->setCellValue('V' . $i, $row['rt']);
    $sheet->setCellValue('W' . $i, $row['rw']);
    $sheet->setCellValue('X' . $i, $row['dusun']);
    $sheet->setCellValue('Y' . $i, $row['desa']);
    $sheet->setCellValue('Y' . $i, $row['kecamatan']);
    $i++;
}

$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \Phpoffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
$i = $i - 1;
$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);


$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Siswa Baru.xlsx');
?>

