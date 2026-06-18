<?php
// PendaftaranReguler.php
require_once __DIR__ . '/Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti Tambahan
    private $pilihanProdi;
    private $lokasiKampus;

    public function __construct($id, $nama, $asal, $nilai, $biayaDasar, $prodi, $kampus) {
        parent::__construct($id, $nama, $asal, $nilai, $biayaDasar);
        $this->pilihanProdi = $prodi;
        $this->lokasiKampus = $kampus;
    }

    public function getPilihanProdi() { return $this->pilihanProdi; }
    public function getLokasiKampus() { return $this->lokasiKampus; }

    // POLIMORFISME OVERRIDING: Logika Biaya Reguler
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar; 
    }

    public function tampilkanInfoJalur() {
        return "Prodi: " . $this->pilihanProdi . " (" . $this->lokasiKampus . ")";
    }

    // Metode Query Spesifik
    public static function getDaftarReguler($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftar = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftar[] = new PendaftaranReguler(
                $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                $row['pilihan_prodi'], $row['lokasi_kampus']
            );
        }
        return $daftar;
    }
}
?>