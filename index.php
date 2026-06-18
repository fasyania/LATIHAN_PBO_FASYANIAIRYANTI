<?php
// File: index.php

// =========================================================================
// [YANG DIBENERIN]: Menghapus nama folder 'koneksi/' dan 'classes/' 
// karena semua file kamu berada langsung di luar (sejajar dengan index.php)
// =========================================================================
require_once 'koneksi.php';
require_once 'pendaftaran.php';
require_once 'pendaftaranReguler.php';
require_once 'pendaftaranPrestasi.php';
require_once 'pendaftaranKedinasan.php';

// Inisialisasi koneksi database menggunakan objek PDO dari Tahap 3
$database = new Database();
$db = $database->getConnection();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi UAS PBO - Panel Pendaftaran Mahasiswa Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center mb-2">Sistem Informasi Pendaftaran Mahasiswa Baru (PMB)</h2>
    <p class="text-center text-muted mb-5">Implementasi Abstraksi, Pewarisan, Enkapsulasi, dan Polimorfisme</p>

    <div class="card shadow-sm mb-5">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Daftar Pendaftaran - Jalur Reguler</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Calon</th>
                        <th>Asal Sekolah</th>
                        <th>Nilai</th>
                        <th>Biaya Dasar</th>
                        <th>Info Spesifik Jalur (Polimorfisme)</th>
                        <th>Total Biaya (Overriding)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Memanggil metode query spesifik dari Tahap 4 secara static
                    $dataReguler = PendaftaranReguler::getDaftarReguler($db);
                    
                    if (count($dataReguler) > 0) {
                        foreach ($dataReguler as $row) {
                            // Instansiasi objek secara dinamis dari baris data database
                            $objekReguler = new PendaftaranReguler(
                                $row['id_pendaftaran'],
                                $row['nama_calon'],
                                $row['asal_sekolah'],
                                $row['nilai_ujian'],
                                $row['biaya_pendaftaran_dasar'],
                                $row['pilihan_prodi'],
                                $row['lokasi_kampus']
                            );
                            
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($objekReguler->getIdPendaftaran()) . "</td>";
                            echo "<td>" . htmlspecialchars($objekReguler->getNamaCalon()) . "</td>";
                            echo "<td>" . htmlspecialchars($objekReguler->getAsalSekolah()) . "</td>";
                            echo "<td>" . htmlspecialchars($objekReguler->getNilaiUjian()) . "</td>";
                            echo "<td>Rp " . number_format($objekReguler->getBiayaPendaftaranDasar(), 0, ',', '.') . "</td>";
                            // Memanfaatkan metode polimorfik tampilkanInfoJalur()
                            echo "<td><span class='badge bg-info text-dark'>" . htmlspecialchars($objekReguler->tampilkanInfoJalur()) . "</span></td>";
                            // Memanfaatkan metode polimorfik hitungTotalBiaya() hasil overriding Tahap 5
                            echo "<td class='fw-bold text-primary'>Rp " . number_format($objekReguler->hitungTotalBiaya(), 0, ',', '.') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center text-muted'>Tidak ada data mahasiswa jalur Reguler.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Daftar Pendaftaran - Jalur Prestasi</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Calon</th>
                        <th>Asal Sekolah</th>
                        <th>Nilai</th>
                        <th>Biaya Dasar</th>
                        <th>Info Spesifik Jalur (Polimorfisme)</th>
                        <th>Total Biaya (Overriding - Rp50k)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Memanggil metode query spesifik Jalur Prestasi
                    $dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($db);
                    
                    if (count($dataPrestasi) > 0) {
                        foreach ($dataPrestasi as $row) {
                            $objekPrestasi = new PendaftaranPrestasi(
                                $row['id_pendaftaran'],
                                $row['nama_calon'],
                                $row['asal_sekolah'],
                                $row['nilai_ujian'],
                                $row['biaya_pendaftaran_dasar'],
                                $row['jenis_prestasi'],
                                $row['tingkat_prestasi']
                            );
                            
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($objekPrestasi->getIdPendaftaran()) . "</td>";
                            echo "<td>" . htmlspecialchars($objekPrestasi->getNamaCalon()) . "</td>";
                            echo "<td>" . htmlspecialchars($objekPrestasi->getAsalSekolah()) . "</td>";
                            echo "<td>" . htmlspecialchars($objekPrestasi->getNilaiUjian()) . "</td>";
                            echo "<td>Rp " . number_format($objekPrestasi->getBiayaPendaftaranDasar(), 0, ',', '.') . "</td>";
                            echo "<td><span class='badge bg-success'>" . htmlspecialchars($objekPrestasi->tampilkanInfoJalur()) . "</span></td>";
                            echo "<td class='fw-bold text-success'>Rp " . number_format($objekPrestasi->hitungTotalBiaya(), 0, ',', '.') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center text-muted'>Tidak ada data mahasiswa jalur Prestasi.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0 fw-bold">Daftar Pendaftaran - Jalur Kedinasan</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Calon</th>
                        <th>Asal Sekolah</th>
                        <th>Nilai</th>
                        <th>Biaya Dasar</th>
                        <th>Info Spesifik Jalur (Polimorfisme)</th>
                        <th>Total Biaya (Overriding + 25%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Memanggil metode query spesifik Jalur Kedinasan
                    $dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
                    
                    if (count($dataKedinasan) > 0) {
                        foreach ($dataKedinasan as $row) {
                            $objekKedinasan = new PendaftaranKedinasan(
                                $row['id_pendaftaran'],
                                $row['nama_calon'],
                                $row['asal_sekolah'],
                                $row['nilai_ujian'],
                                $row['biaya_pendaftaran_dasar'],
                                $row['sk_ikatan_dinas'],
                                $row['instansi_sponsor']
                            );
                            
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($objekKedinasan->getIdPendaftaran()) . "</td>";
                            echo "<td>" . htmlspecialchars($objekKedinasan->getNamaCalon()) . "</td>";
                            echo "<td>" . htmlspecialchars($objekKedinasan->getAsalSekolah()) . "</td>";
                            echo "<td>" . htmlspecialchars($objekKedinasan->getNilaiUjian()) . "</td>";
                            echo "<td>Rp " . number_format($objekKedinasan->getBiayaPendaftaranDasar(), 0, ',', '.') . "</td>";
                            echo "<td><span class='badge bg-warning text-dark'>" . htmlspecialchars($objekKedinasan->tampilkanInfoJalur()) . "</span></td>";
                            echo "<td class='fw-bold text-danger'>Rp " . number_format($objekKedinasan->hitungTotalBiaya(), 0, ',', '.') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center text-muted'>Tidak ada data mahasiswa jalur Kedinasan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>