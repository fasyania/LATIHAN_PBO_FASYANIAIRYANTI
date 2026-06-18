<?php
// File: classes/pendaftaranReguler.php

// Memanggil file induk dengan nama huruf kecil sesuai berkasmu
require_once 'pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan sesuai instruksi (camelCase)
    private $pilihanProdi;
    private $lokasiKampus;

    // Constructor objek Reguler
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar, $pilihanProdi, $lokasiKampus) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar);
        $this->pilihanProdi = $pilihanProdi;
        $this->lokasiKampus = $lokasiKampus;
    }

    // Getter untuk properti tambahan
    public function getPilihanProdi() { return $this->pilihanProdi; }
    public function getLokasiKampus() { return $this->lokasiKampus; }

    /**
     * METODE QUERY SPESIFIK: Mengambil data khusus jalur Reguler
     * Menggunakan perintah SELECT ... WHERE sesuai instruksi dosen
     */
    public static function getDaftarReguler($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, pilihan_prodi, lokasi_kampus 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Reguler'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Mengimplementasikan ulang method abstrak dari parent agar tidak memicu fatal error
     */
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Reguler";
    }
}
?>