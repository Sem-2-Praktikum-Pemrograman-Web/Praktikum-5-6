<?php 
    // Deklarasi variabel nama dan nrp
    $nama = $_GET['nama'] ?? ""; // Menggunakan ?? untuk menghindari error, di mana bila $_GET['nama'] belum terdefinisi atau belum ada nilai, maka akan diberi nilai di sebelah kanannya
    $nrp = $_GET['nrp'] ?? "";

    // Deklarasi untuk nilai tugas
    $tugas_1 = $_GET['tugas_1'] ?? "";
    $tugas_2 = $_GET['tugas_2'] ?? "";
    $project_tengah = $_GET['project_tengah'] ?? "";
    $project_akhir = $_GET['project_akhir'] ?? "";

    // Pengkondisian input nama
    if ($nama == 1) {
        $nama_str = "<p style='color:red'>Nama Belum Diisi !</p>";
    } elseif ($nama == 2) {
        $nama_str = "<p style='color:red'>Nama Harus Berupa Huruf !</p>";
    } else {
        $nama_str = "";
    }

    // Pengkondisian input nrp
    if ($nrp == 1) {
        $nrp_str = "<p style='color:red'>NRP Belum Diisi !</p>";
    } elseif ($nrp == 2) {
        $nrp_str = "<p style='color:red'>NRP Harus Berupa Angka !</p>";
    } else {
        $nrp_str = "";
    }

    // Pengkondisian input tugas-tugas
    if ($tugas_1 == 1) {
        $tugas_1_str = "<p style='color:red'>Nilai Belum Diisi !</p>";
    } elseif ($tugas_1 == 2) {
        $tugas_1_str = "<p style='color:red'>Nilai Harus Berupa Angka !</p>";
    } else {
        $tugas_1_str = "";
    }
    if ($tugas_2 == 1) {
        $tugas_2_str = "<p style='color:red'>Nilai Belum Diisi !</p>";
    } elseif ($tugas_2 == 2) {
        $tugas_2_str = "<p style='color:red'>Nilai Harus Berupa Angka !</p>";
    } else {
        $tugas_2_str = "";
    }
    if ($project_tengah == 1) {
        $project_tengah_str = "<p style='color:red'>Nilai Belum Diisi !</p>";
    } elseif ($project_tengah == 2) {
        $project_tengah_str = "<p style='color:red'>Nilai Harus Berupa Angka !</p>";
    } else {
        $project_tengah_str = "";
    }
    if ($project_akhir == 1) {
        $project_akhir_str = "<p style='color:red'>Nilai Belum Diisi !</p>";
    } elseif ($project_akhir == 2) {
        $project_akhir_str = "<p style='color:red'>Nilai Harus Berupa Angka !</p>";
    } else {
        $project_akhir_str = "";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pribadi</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script> <!-- Menggunakan CDN Tailwind CSS -->
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
        <form action="2.result_display.php" method="post">
            <!-- Form data diri  -->
            <h1 class="text-2xl font-semibold text-center mb-4">Data Diri</h1>
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                <input type="text" name="nama" id="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="contoh: Rizal Maulana">
                <?php echo $nama_str?>
            </div>
            <div class="mb-4">
                <label for="nrp" class="block text-gray-700 text-sm font-bold mb-2">NRP:</label>
                <input type="text" name="nrp" id="nrp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="contoh: 3124600033">
                <?php echo $nrp_str?>
            </div>

            <!-- Garis pemisah -->
            <div class="h-[0.1rem] bg-gray-400 my-10 w-full"></div>

            <!-- Form input nilai tugas-tugas -->
            <h1 class="text-2xl font-semibold text-center mb-4 -mt-1">Informasi Nilai</h1>
            <div class="mb-4">
                <label for="tugas_1" class="block text-gray-700 text-sm font-bold mb-2">Tugas 1:</label>
                <input type="text" name="tugas_1" id="tugas_1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="contoh: 87">
                <?php echo $tugas_1_str?>
            </div>
            <div class="mb-4">
                <label for="tugas_2" class="block text-gray-700 text-sm font-bold mb-2">Tugas 2:</label>
                <input type="text" name="tugas_2" id="tugas_2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="contoh: 90">
                <?php echo $tugas_2_str?>
            </div>
            <div class="mb-4">
                <label for="project_tengah" class="block text-gray-700 text-sm font-bold mb-2">Project Tengah Semester:</label>
                <input type="text" name="project_tengah" id="project_tengah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="contoh: 91">
                <?php echo $project_tengah_str?>
            </div>
            <div class="mb-4">
                <label for="project_akhir" class="block text-gray-700 text-sm font-bold mb-2">Project Akhir:</label>
                <input type="text" name="project_akhir" id="project_akhir" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="contoh: 96">
                <?php echo $project_akhir_str?>
            </div>

            <!-- Button untuk submit form -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>