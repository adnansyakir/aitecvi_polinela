<?php

// Import namespace yang diperlukan
use Config\Database;

function siswaKelas($kelas_id)
{
    // Ambil koneksi database
    $db = Database::connect();

    // Pengecekan keberadaan data di tabel kelas_detail
    $result = $db->table('kelas_detail')->select('count(siswa_id) as siswa')

        ->where('kelas_id', $kelas_id)
        ->get()->getRow();

    // Hasilnya true jika data ditemukan, false jika tidak
    return $result;
}


function absensiEdit($absensi_id, $siswa_id)
{
    // Ambil koneksi database
    $db = Database::connect();

    // Pengecekan keberadaan data di tabel kelas_detail
    $result = $db->table('absensi_detail')
        ->select('absensi_detail.*')
        ->where('absensi_id', $absensi_id)
        ->where('siswa_id', $siswa_id)
        ->get()->getRow();

    // Hasilnya true jika data ditemukan, false jika tidak
    return $result;
}
function absensiJumlah($kehadiran, $siswa_id, $jadwalId)
{
    // Ambil koneksi database
    $db = Database::connect();

    // Pengecekan keberadaan data di tabel kelas_detail
    $result = $db->table('absensi_detail')
        ->join('absensi', 'absensi_detail.absensi_id = absensi.id')
        ->select('absensi_detail.*')
        ->where('absensi_detail.kehadiran', $kehadiran)
        ->where('siswa_id', $siswa_id)
        ->where('absensi.jadwal_id', $jadwalId)
        ->countAllResults();

    // Hasilnya true jika data ditemukan, false jika tidak
    return $result;
}

function siswaAbsen($jadwalId)
{
    // Ambil koneksi database
    $db = Database::connect();
    date_default_timezone_set('Asia/Jakarta');
    // Pengecekan keberadaan data di tabel kelas_detail
    $result = $db->table('absensi')->select('absensi.id')

        ->where('jadwal_id', $jadwalId)
        ->where('tanggal', date('Y-m-d'))
        ->countAllResults();

    // Hasilnya true jika data ditemukan, false jika tidak
    return $result;
}



// hitung telat
function hitungSelisihWaktuMenit($waktuAwal, $waktuAkhir)
{
    // Konversi string waktu menjadi menit
    list($jamAwal, $menitAwal, $detikAwal) = explode(":", $waktuAwal);
    list($jamAkhir, $menitAkhir, $detikAkhir) = explode(":", $waktuAkhir);

    // Hitung selisih waktu dalam menit
    $selisihWaktuMenit = ($jamAkhir * 60 + $menitAkhir) - ($jamAwal * 60 + $menitAwal);

    return $selisihWaktuMenit;
}


// Fungsi-fungsi lainnya...

if (!function_exists('encrypt_url')) {
    function encrypt_url($data)
    {
        return urlencode(base64_encode($data));
    }
}

if (!function_exists('decrypt_url')) {
    function decrypt_url($encryptedData)
    {
        return base64_decode(urldecode($encryptedData));
    }
}

if (!function_exists('cek_login')) {
    function cek_login($role = null)
    {
        $session = session();
        if (!$session->has('username')) {
            return redirect()->to('/');
        }
    }
}


function Hari($tanggal = null)
{
    // Jika tidak ada tanggal yang diberikan, gunakan tanggal hari ini
    if ($tanggal === null) {
        $tanggal = date('Y-m-d');
    }

    // Ubah format tanggal ke timestamp
    $timestamp = strtotime($tanggal);

    // Mendapatkan nama hari dalam bahasa Inggris
    $namaHariInggris = date('l', $timestamp);

    // Daftar nama hari dalam bahasa Inggris dan bahasa Indonesia
    $hariIndonesia = [
        'Monday'    => 'Senin',
        'Tuesday'   => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday'  => 'Kamis',
        'Friday'    => 'Jumat',
        'Saturday'  => 'Sabtu',
        'Sunday'    => 'Minggu'
    ];

    // Mengembalikan nama hari dalam bahasa Indonesia
    return $hariIndonesia[$namaHariInggris];
}

// Contoh penggunaan



function tglIndo($tanggal)
{
    // Konversi tanggal ke objek DateTime
    $dateTime = new DateTime($tanggal);

    // Array nama hari dalam bahasa Indonesia
    $hari = [
        'Minggu', 'Senin', 'Selasa',
        'Rabu', 'Kamis', 'Jumat', 'Sabtu'
    ];

    // Ambil nama hari dari array
    $namaHari = $hari[$dateTime->format('w')];

    // Ambil komponen tanggal
    $day = $dateTime->format('d');
    $month = $dateTime->format('m');
    $year = $dateTime->format('Y');

    // Array nama bulan dalam bahasa Indonesia
    $bulan = [
        'Januari', 'Februari', 'Maret',
        'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September',
        'Oktober', 'November', 'Desember'
    ];

    // Ambil nama bulan dari array
    $namaBulan = $bulan[(int)$month - 1];

    // Format tanggal dalam format Indonesia
    $tanggalIndonesia = $namaHari . ', ' . $day . ' ' . $namaBulan . ' ' . $year;

    return $tanggalIndonesia;
}




function tglIndoSimple($tanggal)
{
    // Konversi tanggal ke objek DateTime
    $dateTime = new DateTime($tanggal);

    // Ambil komponen tanggal
    $day = $dateTime->format('d');

    // Array nama bulan dalam bahasa Indonesia
    $bulan = [
        'Jan', 'Feb', 'Mar',
        'Apr', 'Mei', 'Jun',
        'Jul', 'Ags', 'Sep',
        'Okt', 'Nov', 'Des'
    ];

    // Ambil nama bulan dari array
    $namaBulan = $bulan[(int)$dateTime->format('m') - 1];

    // Ambil tahun
    $year = $dateTime->format('Y');

    // Format tanggal dalam format yang diinginkan (01 Jan 2024)
    $tanggalFormatted = $day . ' ' . $namaBulan . ' ' . $year;

    return $tanggalFormatted;
}




function tglIndoWithTime($datetime)
{
    // Konversi DateTime ke string format
    $formattedDateTime = $datetime->format('Y-m-d H:i:s');

    // Ubah string format menjadi timestamp
    $timestamp = strtotime($formattedDateTime);

    // Panggil fungsi tglIndo untuk konversi tanggal
    $tanggalIndo = tglIndoTime($timestamp);

    return $tanggalIndo;
}
function tglIndoTime($datetime)
{
    // Konversi string datetime ke timestamp
    $timestamp = strtotime($datetime);

    // Konversi timestamp ke objek DateTime
    $dateTime = new DateTime('@' . $timestamp);

    // Array nama hari dalam bahasa Indonesia
    $hari = [
        'Minggu', 'Senin', 'Selasa',
        'Rabu', 'Kamis', 'Jumat', 'Sabtu'
    ];

    // Ambil nama hari dari array
    $namaHari = $hari[$dateTime->format('w')];

    // Ambil komponen tanggal
    $day = $dateTime->format('d');
    $month = $dateTime->format('m');
    $year = $dateTime->format('Y');
    $hour = $dateTime->format('H');
    $minute = $dateTime->format('i');
    $second = $dateTime->format('s');

    // Array nama bulan dalam bahasa Indonesia
    $bulan = [
        'Januari', 'Februari', 'Maret',
        'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September',
        'Oktober', 'November', 'Desember'
    ];

    // Ambil nama bulan dari array
    $namaBulan = $bulan[(int)$month - 1];

    // Format tanggal dalam format Indonesia
    $tanggalIndonesia = $namaHari . ', ' . $day . ' ' . $namaBulan . ' ' . $year . ' | Pukul ' . $hour . ':' . $minute . ':' . $second;

    return $tanggalIndonesia;
}



function statusAbsen($kehadiran)
{
    switch ($kehadiran) {
        case 'H':
            return 'Hadir';
            break;
        case 'A':
            return 'Alfa';
            break;
        case 'I':
            return 'Izin';
            break;
        case 'S':
            return 'Sakit';
            break;

        default:
            break;
    }
}


function jam($tanggal)
{
    $timestamp = strtotime($tanggal);
    return date("H:i", $timestamp);
}

function konversiRupiah($angka)
{
    try {
        // Pastikan angka yang diberikan adalah numerik
        $angka = floatval($angka);

        // Format angka menjadi mata uang Rupiah dengan pemisah ribuan
        $rupiahFormat = number_format($angka, 0, ',', '.');

        // Tambahkan simbol mata uang Rupiah
        $rupiahFormat = "Rp " . $rupiahFormat;

        return $rupiahFormat;
    } catch (Exception $e) {
        return "Input tidak valid. Masukkan angka.";
    }
}



if (!function_exists('lengkapiProfile')) {
    function lengkapiProfile($npm)
    {


        $db = Database::connect();
        $profil = $db->table('mahasiswa')
            ->select('*')

            ->where([
                'npm' => $npm,
            ])
            ->get()->getRow();

        // Tentukan kolom-kolom yang ingin Anda hitung persentasenya
        $kolomYangDihitung = array(
            'npm', 'nama', 'email', 'jenis_kelamin', 'no_hp', 'tanggal_lahir', 'tempat_lahir', 'alamat',
            'prodi_id', 'jurusan_id', 'asal_sekolah', 'tahun_lulus_sekolah', 'jenis_sekolah', 'jurusan_sma',
            'nama_ayah', 'pekerjaan_ayah_id', 'penghasilan_ayah_id', 'no_hp_ayah', 'nama_ibu',
            'pekerjaan_ibu_id', 'penghasilan_ibu_id', 'no_hp_ibu', 'tahun_masuk', 'jalur_masuk_id',
            'pembiayaan_id', 'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'kelurahan_id', 'status',
            'tahun_akademik_id', 'foto',
            // ... tambahkan kolom-kolom lain yang ingin Anda hitung
        );

        $jumlahKolomTerisi = 0;

        foreach ($kolomYangDihitung as $kolom) {
            // Ganti notasi array menjadi notasi objek
            if (!empty($profil->{$kolom})) {
                $jumlahKolomTerisi++;
            }
        }

        // Hitung persentase
        $totalKolom = count($kolomYangDihitung);
        $persentaseTerisi = ($jumlahKolomTerisi / $totalKolom) * 100;

        return $persentaseTerisi;
    }


    function contentLaporan($uri)
    {
        switch ($uri) {
            case 'rekap-jadwal':
                return 'Rekap Jadwal Perkuliahan';
                break;
            case 'rekap-rps':
                return 'Rekap RPS';
                break;
            case 'rekap-perkuliahan':
                return 'Rekap Perkuliahan';
                break;
            case 'rekap-soal':
                return 'Rekap Soal';
                break;
            case 'terlambat':
                return 'Rekap Data Keterlambatan';
                break;
            case 'rekap-layak':
                return 'Rekap Kelayakan UAS';
                break;
            case 'pp':
                return 'Praktik Pengganti';
                break;
            case 'disiplin':
                return 'Rekap Data Kedisiplinan';
                break;

            default:
                return 'Tidak ada';
                break;
        }
    }
}
