<?php
// PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // [Tahap 4] Properti Tambahan
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($id, $nama, $asal, $nilai, $biayaDasar, $sk, $sponsor) {
        parent::__construct($id, $nama, $asal, $nilai, $biayaDasar);
        $this->skIkatanDinas = $sk;
        $this->instansiSponsor = $sponsor;
    }

    public function getSkIkatanDinas() { return $this->skIkatanDinas; }
    public function getInstansiSponsor() { return $this->instansiSponsor; }

    // =========================================================================
    // [Tahap 5] POLIMORFISME OVERRIDING: Logika Biaya Kedinasan
    // =========================================================================
    public function hitungTotalBiaya() {
        // Dikenakan surcharge/biaya tambahan administrasi khusus & kemitraan dinas sebesar 25% (* 1.25)
        return $this->biayaPendaftaranDasar * 1.25; 
    }

    public function tampilkanInfoJalur() {
        return "Instansi: " . $this->instansiSponsor . " (No SK: " . $this->skIkatanDinas . ")";
    }

    // [Tahap 4] Metode Query Spesifik
    public static function getDaftarKedinasan($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftar = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftar[] = new PendaftaranKedinasan(
                $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                $row['sk_ikatan_dinas'], $row['instansi_sponsor']
            );
        }
        return $daftar;
    }
}
?>