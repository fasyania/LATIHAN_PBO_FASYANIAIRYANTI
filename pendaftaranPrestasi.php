<?php
// File: classes/pendaftaranPrestasi.php

require_once 'pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan sesuai instruksi (camelCase)
    private $jenisPrestasi;
    private $tingkatPrestasi;

    // Constructor objek Prestasi
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar, $jenisPrestasi, $tingkatPrestasi) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar);
        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    // Getter untuk properti tambahan
    public function getJenisPrestasi() { return $this->jenisPrestasi; }
    public function getTingkatPrestasi() { return $this->tingkatPrestasi; }

    /**
     * METODE QUERY SPESIFIK: Mengambil data khusus jalur Prestasi
     */
    public static function getDaftarPrestasi($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jenis_prestasi, tingkat_prestasi 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Prestasi'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * TAHAP 5: Overriding Polimorfisme - Jalur Prestasi
     * Total Biaya = biayaPendaftaranDasar - Potongan Rp50.000
     */
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar - 50000;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Prestasi | Jenis: " . $this->jenisPrestasi . " | Tingkat: " . $this->tingkatPrestasi;
    }
}
?>