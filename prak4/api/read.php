<?php

header("Access-Control-Allow-Origin: *"); //mengizinkan akses dari semua domain
header("Content-Type: application/json; charset=UTF-8"); //menentukan tipe konten yang dikirimkan adalah JSON
header("Access-Control-Allow-Methods: GET"); //mengizinkan metode HTTP GET

if ($_SERVER['REQUEST_METHOD'] !== 'GET') { //memeriksa apakah metode HTTP yang digunakan adalah GET
    http_response_code(405); //mengirimkan kode status 405 Method Not Allowed
    echo json_encode(["message" => "Method tidak diizinkan."]); //mengirimkan pesan error dalam format JSON
    exit; //menghentikan eksekusi script jika metode HTTP tidak diizinkan
}

include_once '../config/Database.php'; //mengimpor file Database.php yang berisi kelas Database
include_once '../models/Mahasiswa.php'; //mengimpor file Mahasiswa.php yang berisi kelas Mahasiswa

$database = new Database(); //membuat objek Database untuk mengelola koneksi ke database
$db = $database->getConnection(); //mendapatkan koneksi database dari objek Database

$mahasiswa = new Mahasiswa($db); //membuat objek Mahasiswa dan mengirimkan koneksi database ke konstruktor kelas Mahasiswa
$stmt = $mahasiswa->read(); //memanggil metode read() dari objek Mahasiswa untuk mengambil data mahasiswa dari database
$num = $stmt->rowCount(); //menghitung jumlah baris yang dikembalikan oleh query, jika lebih dari 0 berarti data ditemukan

if ($num > 0) { //memeriksa apakah data ditemukan, jika ya maka akan diproses untuk dikirimkan dalam format JSON
    $mhs_arr = array(); //membuat array kosong untuk menyimpan data mahasiswa yang akan dikirimkan
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { //mengambil setiap baris data mahasiswa dalam bentuk array asosiatif
        extract($row); //mengubah elemen array menjadi variabel dengan nama yang sesuai dengan kunci array
        $mhs_item = array( //membuat array untuk menyimpan data mahasiswa yang akan dikirimkan
            "id" => $id, //menyimpan nilai id mahasiswa
            "nama" => $nama, //menyimpan nilai nama mahasiswa
            "npm" => $npm, //menyimpan nilai npm mahasiswa
            "jurusan" => $jurusan //menyimpan nilai jurusan mahasiswa
        );
        array_push($mhs_arr, $mhs_item); //menambahkan array mahasiswa yang telah dibuat ke dalam array utama $mhs_arr
    }
    http_response_code(200); //mengirimkan kode status 200 OK untuk menunjukkan bahwa permintaan berhasil diproses
    echo json_encode($mhs_arr); //mengirimkan data mahasiswa dalam format JSON
} else {
    http_response_code(404); //mengirimkan kode status 404 Not Found jika tidak ada data mahasiswa yang ditemukan
    echo json_encode(array("message" => "Data tidak ditemukan."));
}
?>