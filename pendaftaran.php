<?php
// Pendaftaran.php

abstract class Pendaftaran {
    // Properti Terenkapsulasi (protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biayaPendaftaranDasar;

    public function __construct($id, $nama, $asal, $nilai, $biayaDasar) {
        $this->id_pendaftaran = $id;
        $this->nama_calon = $nama;
        $this->asal_sekolah = $asal;
        $this->nilai_ujian = $nilai;
        $this->biayaPendaftaranDasar = $biayaDasar;
    }

    // Getter untuk properti global agar bisa diakses di View
    public function getIdPendaftaran() { return $this->id_pendaftaran; }
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
    public function getBiayaDasar() { return $this->biayaPendaftaranDasar; }

    // Metode Abstrak (Wajib di-override oleh kelas anak)
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();
}
?>