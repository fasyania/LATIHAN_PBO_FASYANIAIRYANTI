<?php
// File: classes/pendaftaranKedinasan.php

require_once 'pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan sesuai instruksi (camelCase)
    private $skIkatanDinas;
    private $instansiSponsor;

    // Constructor objek Kedinasan
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar, $skIkatanDinas, $instansiSponsor) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    // Getter untuk properti tambahan
    public function getSkIkatanDinas() { return $this->skIkatanDinas; }
    public function getInstansiSponsor() { return $this->instansiSponsor; }

    /**
     * METODE QUERY SPESIFIK: Mengambil data khusus jalur Kedinasan
     */
    public static function getDaftarKedinasan($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, sk_ikatan_dinas, instansi_sponsor 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Kedinasan'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * TAHAP 5: Overriding Polimorfisme - Jalur Kedinasan
     * Total Biaya = biayaPendaftaranDasar * 1.25 (Surcharge 25%)
     */
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.25;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Kedinasan | SK: " . $this->skIkatanDinas . " | Sponsor: " . $this->instansiSponsor;
    }
}
?>