<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 12</title>
</head>
<body>
    <h1>Nilai Mahasiswa</h1>
    <form action="" method="post">
        <label for="nama">Nama :</label>
        <input type="text" id="nama" name="nama" required <br><br>
        <label for="nim">NIM :</label>
        <input type="text" id="nim" name="nim" required<br><br>
        <label >Kelas :</label>

        <?php
        for($i = 'A'; $i <= 'J'; $i++){
            echo "<input type = 'radio' id = 'kelas$i' name = 'kelas' value = 'kelas $i' required>
            <label for = 'kelas$i'> kelas $i </label><br>";

        }

        ?><br>
        <label for = "prodi"> Prodi : </label>
        <select name="prodi" id="prodi" required>
            <option value = "--PILIH--">--PILIH--</option>
            <option value = "Informatika">Informatika</option>
            <option value = "Teknik Industri">Teknik Industri</option>
            <option value = "Teknik Elektro">Teknik Elektro</option>
            <option value = "Teknik Pangan">Teknik Pangan</option>
            <option value = "Teknik Kimia">Teknik Kimia</option>
    </select><br><br>

    <label for = "nilai">Nilai : </label>
    <input type="number" id="nilai" name="nilai" required <br><br>

    <input type="submit" value="submit">
    </form>

    <?php
    function tentukanPredikat($nilai){
        $batasNilai = [
            'A+' => 80,
            'A-' => 76,
            'B+' => 68,
            'B' =>  65,
            'B-' => 62,
            'C+' => 57,
            'C' =>  55,
            'C-' => 51,
            'D+' => 43,
            'D' =>  40,
            'E' =>  0,
        ];
        $keys = array_keys ($batasNilai);
        $values = array_values($batasNilai);
        $jumlah = count($batasNilai);

        for($i = 0; $i < $jumlah; $i++){
            if($nilai >= $values[$i]){
                return $keys[$i];
            }
        }
        return 'E';
    }

    if($_SERVER["REQUEST_METHOD"] =="POST"){
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $kelas = $_POST['kelas'];
        $prodi = $_POST['prodi'];
        $nilai = $_POST['nilai'];
        $predikat = tentukanPredikat($nilai);


        echo "<h2>Informasi Mahasiswa</h2>";
        echo "Nama : $nama <br>";
        echo "NIM : $nim <br>";
        echo "Kelas : $kelas <br>";
        echo "Prodi : $prodi <br>";
        echo "Nilai : $nilai <br>";
        echo "Predikat : $predikat <br>";

        if($nilai >= 60){
            echo "Nilai anda $nilai, anda lulus <br>";
        }else{
            echo "Nilai anda $nilai, anda gagal <br>";
        }
    }
    ?>
</body>
</html>