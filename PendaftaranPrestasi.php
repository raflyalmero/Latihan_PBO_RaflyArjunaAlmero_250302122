<?php
// PendaftaranPrestasi.php
require_once __DIR__ . '/Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // [Tahap 4] Properti Tambahan Spesifik Prestasi
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($id, $nama, $asal, $nilai, $biayaDasar, $jenis, $tingkat) {
        parent::__construct($id, $nama, $asal, $nilai, $biayaDasar);
        $this->jenisPrestasi = $jenis;
        $this->tingkatPrestasi = $tingkat;
    }

    public function getJenisPrestasi() { return $this->jenisPrestasi; }
    public function getTingkatPrestasi() { return $this->tingkatPrestasi; }

    // =========================================================================
    // [Tahap 5] POLIMORFISME OVERRIDING: Logika Biaya Prestasi
    // =========================================================================
    public function hitungTotalBiaya() {
        // Mendapatkan potongan/insentif apresiasi prestasi sebesar Rp50.000 dari biaya dasar
        return $this->biayaPendaftaranDasar - 50000; 
    }

    public function tampilkanInfoJalur() {
        return "Prestasi: " . $this->jenisPrestasi . " (" . $this->tingkatPrestasi . ")";
    }

    // [Tahap 4] Metode Query Spesifik Jalur Prestasi
    public static function getDaftarPrestasi($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftar = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftar[] = new PendaftaranPrestasi(
                $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                $row['jenis_prestasi'], $row['tingkat_prestasi']
            );
        }
        return $daftar;
    }
}
?>