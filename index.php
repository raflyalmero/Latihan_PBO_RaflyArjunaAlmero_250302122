<?php
// index.php

// Memanggil file koneksi database yang telah diubah namanya
require_once __DIR__ . '/koneksi/database.php';

// Memanggil kelas-kelas anak (subclass) dari Tahap 4 & 5
require_once __DIR__ . '/PendaftaranReguler.php';
require_once __DIR__ . '/PendaftaranPrestasi.php';
require_once __DIR__ . '/PendaftaranKedinasan.php';

// 1. Inisialisasi koneksi database
$database = new Database();
$db = $database->getConnection();

// 2. Mengambil data dinamis secara terpisah menggunakan metode query spesifik (Tahap 4)
$dataReguler   = PendaftaranReguler::getDaftarReguler($db);
$dataPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($db);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);

/**
 * Helper function untuk merender tabel secara dinamis berdasarkan kategori jalur.
 * Fungsi ini memanfaatkan POLIMORFISME untuk memproses objek yang berbeda.
 */
function renderTabelPendaftaran($daftarObjek, $judulKategori, $headerClass) {
    echo "<h3 class='mt-4 mb-3 fw-semibold'>$judulKategori</h3>";
    echo "<div class='table-responsive mb-5'>";
    echo "<table class='table table-striped table-hover table-bordered align-middle'>";
    echo "<thead class='$headerClass text-white'>
            <tr>
                <th style='width: 5%;'>ID</th>
                <th style='width: 20%;'>Nama Calon</th>
                <th style='width: 15%;'>Asal Sekolah</th>
                <th style='width: 10%;'>Nilai Ujian</th>
                <th style='width: 15%;'>Biaya Dasar</th>
                <th style='width: 20%;'>Atribut Spesifik (Info Jalur)</th>
                <th style='width: 15%;'>Total Biaya Akhir</th>
            </tr>
          </thead>";
    echo "<tbody>";
    
    if (empty($daftarObjek)) {
        echo "<tr><td colspan='7' class='text-center text-muted py-3'>Tidak ada data calon mahasiswa untuk jalur ini.</td></tr>";
    } else {
        foreach ($daftarObjek as $mhs) {
            echo "<tr>";
            echo "<td>" . $mhs->getIdPendaftaran() . "</td>";
            echo "<td>" . htmlspecialchars($mhs->getNamaCalon()) . "</td>";
            echo "<td>" . htmlspecialchars($mhs->getAsalSekolah()) . "</td>";
            echo "<td class='text-center'>" . $mhs->getNilaiUjian() . "</td>";
            echo "<td>Rp " . number_format($mhs->getBiayaDasar(), 2, ',', '.') . "</td>";
            
            // 3. Manfaat Polimorfisme pertama: mencetak atribut unik jalur melalui tampilkanInfoJalur()
            echo "<td><span class='badge bg-dark px-2 py-2 text-wrap text-start w-100'>" . htmlspecialchars($mhs->tampilkanInfoJalur()) . "</span></td>";
            
            // 3. Manfaat Polimorfisme kedua: mencetak hasil kalkulasi biaya akhir melalui hitungTotalBiaya()
            echo "<td class='fw-bold text-success'>Rp " . number_format($mhs->hitungTotalBiaya(), 2, ',', '.') . "</td>";
            echo "</tr>";
        }
    }
    echo "</tbody></table></div>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendaftaran Mahasiswa Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5 shadow-sm p-4 bg-white rounded-3">
        
        <div class="text-center mb-5 border-bottom pb-4">
            <h1 class="fw-bold text-primary">Sistem Pendaftaran Mahasiswa Baru</h1>
            <p class="text-muted mb-0">Implementasi Tugas Simulasi PBO - Tampilan Data Dinamis & Polimorfisme Objek</p>
        </div>

        <?php 
            // Memisahkan tampilan data calon mahasiswa berdasarkan kategori/jalur (Sesuai Poin 2)
            
            // Render Tabel Jalur Reguler (Warna Biru / bg-primary)
            renderTabelPendaftaran($dataReguler, "1. Kategori Jalur Reguler (Tarif Murni Dasar)", "bg-primary");
            
            // Render Tabel Jalur Prestasi (Warna Hiju / bg-success)
            renderTabelPendaftaran($dataPrestasi, "2. Kategori Jalur Prestasi (Potongan Apresiasi Rp50.000)", "bg-success");
            
            // Render Tabel Jalur Kedinasan (Warna Merah / bg-danger)
            renderTabelPendaftaran($dataKedinasan, "3. Kategori Jalur Kedinasan (Surcharge Administrasi +25%)", "bg-danger");
        ?>
        
        <div class="text-end text-muted small mt-4 pt-3 border-top">
            Aplikasi Terverifikasi Berbasis OOP PHP & PDO MySQL
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>