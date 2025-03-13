<?php
    // Deklarasi variabel nama dan nrp sekaligus mendapatkan data dari form sebelumnya
    $nama = $_POST['nama']; 
    $nrp = $_POST['nrp']; 

    // Deklarasi variabel tugas-tugas sekaligus mendapatkan data dari form sebelumnya
    $tugas_1 = $_POST["tugas_1"];
    $tugas_2 = $_POST["tugas_2"];
    $project_tengah = $_POST["project_tengah"];
    $project_akhir = $_POST["project_akhir"];

    // Pengkondisian apakah variabel nama, nrp atau tugas-tugas memiliki nilai kosong atau tidak sesuai dengan perintah
    if ($nama == "" || $nrp == "" || $tugas_1 == "" || $tugas_2 == "" || $project_tengah == "" || $project_akhir == "") {
        header("location:1.personal_info.php?nama=" . cek_str($nama) . "&nrp=" . cek_num($nrp) . "&tugas_1=" . cek_num($tugas_1) . "&tugas_2=" . cek_num($tugas_2) . "&project_tengah=" . cek_num($project_tengah) . "&project_akhir=" . cek_num($project_akhir));
        exit(0);
    } elseif (is_numeric($nama)) {
        header("location:1.personal_info.php?nama=" . cek_str($nama));
        exit(0);
    } elseif (!is_numeric($nrp) || !is_numeric($tugas_1) || !is_numeric($tugas_2) || !is_numeric($project_tengah) || !is_numeric($project_akhir)) {
        header("location:1.personal_info.php?nrp=" . cek_num($nrp) . "&tugas_1=" . cek_num($tugas_1) . "&tugas_2=" . cek_num($tugas_2) . "&project_tengah=" . cek_num($project_tengah) . "&project_akhir=" . cek_num($project_akhir));
        exit(0);
    } else{ // Jika semua variabel sudah terisi dan sesuai dengan perintah maka program berlanjut ke penghitungan nilai akhir
        // Penentuan bobot tiap nilai tugas
        $bobot_t1 = ($tugas_1 * 0.3);
        $bobot_t2 = ($tugas_2 * 0.3);
        $bobot_pt = ($project_tengah * 0.2);
        $bobot_pa = ($project_akhir * 0.2);

        // Penghitungan nilai akhir
        $nilai_akhir = $bobot_t1 + $bobot_t2 + $bobot_pt + $bobot_pa;

        // Konversi dari nilai akhir ke huruf dan warna yang disesuaikan dengan nilai akhir
        if ($nilai_akhir >= 85) {
            $nilai_huruf = 'A';
            $warna = 'bg-blue-500';
        } elseif ($nilai_akhir >= 80) {
            $nilai_huruf = 'A-';
            $warna = 'bg-green-500';
        } elseif ($nilai_akhir >= 75) {
            $nilai_huruf = 'B+';
            $warna = 'bg-green-500';
        } elseif ($nilai_akhir >= 70) {
            $nilai_huruf = 'B';
            $warna = 'bg-yellow-500';
        } elseif ($nilai_akhir >= 65) {
            $nilai_huruf = 'B-';
            $warna = 'bg-yellow-500';
        } elseif ($nilai_akhir >= 60) {
            $nilai_huruf = 'C+';
            $warna = 'bg-orange-500';
        } elseif ($nilai_akhir >= 55) {
            $nilai_huruf = 'C';
            $warna = 'bg-orange-500';
        } elseif ($nilai_akhir >= 40) {
            $nilai_huruf = 'D';
            $warna = 'bg-red-500';
        } else {
            $nilai_huruf = 'E';
            $warna = 'bg-red-500';
        }    
    }

    // Fungsi untuk mengecek string, apakah masih kosong, berupa angka atau sudah sesuai
    function cek_str($val) { 
        if ($val == "") { 
            return 1;
        } elseif(is_numeric($val)){
            return 2;
        }
        return 0; 
    } 

    // Fungsi untuk mengecek nilai angka, apakah masih kosong, berupa string atau huruf, atau sudah sesuai
    function cek_num($val) { 
        if ($val == "") { 
            return 1;
        } elseif(!is_numeric($val)){
            return 2;
        }
        return 0; 
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta nama="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Results</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script> <!-- Menggunakan Tailwind CSS -->
</head>
<body class="p-5">
    <style>
        /* Untuk mensetting background agar memiliki efek blur */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://4kwallpapers.com/images/walls/thumbs_3t/21290.jpg');
            background-size: cover;
            background-position: center;
            filter: blur(20px);
            z-index: -1;
        }    
    </style>

    <div class="max-w-md mx-auto bg-[#ECF0F0] rounded-xl shadow-md p-6">
        <h1 class="text-2xl font-semibold text-center mb-6">Hasil Nilai Mahasiswa</h1>
        <!-- Menunjukkan nama dan nrp yang telah diinputkan -->
        <div class="mb-4">
            <p><strong>Nama:</strong> <?php echo $_POST['nama']; ?></p>
            <p><strong>NRP:</strong> <?php echo $_POST['nrp']; ?></p>
        </div>

        <!-- Tabel Nilai Mahasiswa -->
        <table class="w-full text-left table-auto">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Tugas</th>
                    <th class="border px-4 py-2">Nilai</th>
                    <th class="border px-4 py-2">Bobot Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-4 py-2">Tugas 1 (30%)</td>
                    <td class="border px-4 py-2 text-center"><?php echo $tugas_1; ?></td>
                    <td class="border px-4 py-2 text-center"><?php echo $bobot_t1; ?></td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">Tugas 2 (30%)</td>
                    <td class="border px-4 py-2 text-center"><?php echo $tugas_2; ?></td>
                    <td class="border px-4 py-2 text-center"><?php echo $bobot_t2; ?></td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">Mid-term Project (20%)</td>
                    <td class="border px-4 py-2 text-center"><?php echo $project_tengah; ?></td>
                    <td class="border px-4 py-2 text-center"><?php echo $bobot_pt; ?></td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">Final Project (20%)</td>
                    <td class="border px-4 py-2 text-center"><?php echo $project_akhir; ?></td>
                    <td class="border px-4 py-2 text-center"><?php echo $bobot_pa; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="mt-6 flex justify-between text-center">

            <!-- Menampilkan nilai akhir mahasiswa dalam angka -->
            <div class="bg-blue-500 text-white p-4 rounded-lg">
                <h3 class="text-lg font-semibold">Nilai Akhir:</h3>
                <p class="text-2xl font-bold mt-2"><?php echo $nilai_akhir; ?></p>
            </div>

            <!-- Menampilkan nilai akhir mahasiswa dalam huruf -->
            <div class="<?php echo $warna; ?> text-white p-4 rounded-lg">
                <h3 class="text-lg font-semibold">Nilai Huruf:</h3>
                <p class="text-2xl font-bold mt-2"><?php echo $nilai_huruf; ?></p>
            </div>
        </div>

        <!-- Tombol untuk mengulang program -->
        <div class="mt-6 flex justify-end">
          <a href="1.personal_info.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ulangi</a>
        </div>
    </div>
</body>
</html>