<?php
// File: classes/Pendaftaran.php

abstract class Pendaftaran {
    // Properti Terenkapsulasi (protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar; // Format camelCase sesuai instruksi soal

    // Constructor untuk memetakan data dari kolom tabel database
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar) {
        $this->id_pendaftaran = $id_pendaftaran;
        $this->nama_calon = $nama_calon;
        $this->asal_sekolah = $asal_sekolah;
        $this->nilai_ujian = $nilai_ujian;
        // Memetakan dari kolom database 'biaya_pendaftaran_dasar' ke properti kelas
        $this->biayaPendaftaranDasar = $biaya_pendaftaran_dasar; 
    }

    // Getter untuk membantu akses properti di luar kelas
    public function getIdPendaftaran() { return $this->id_pendaftaran; }
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
    public function getBiayaPendaftaranDasar() { return $this->biayaPendaftaranDasar; }

    /**
     * METODE ABSTRAK (Wajib Kosong / Tanpa Body)
     * Hanya deklarasi nama metode dan langsung diakhiri dengan tanda titik koma (;).
     */
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();
}
?>