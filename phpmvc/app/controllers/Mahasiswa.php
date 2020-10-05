<?php
// jangan lupa tambahkan extends Controller agar bisa di akses
// class ini 

class Mahasiswa extends Controller{
    public function index()
    {
        // defenisikan dulu datanya dari mana 
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        // setelah itu kita kirimkan datanta ke header,index
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        // ambilsatu record berdasarkan id yg di url 
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        // setelah itu kita kirimkan datanta ke header,index
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        // kita cek dulu apakah datanya di kirim ke sini 
        // var_dump($_POST); ok benar 
        // $_POST > 0 artinya ada penambahan baris data berarti ada data yg masuk ke sini maka jalankan ini utk 
        // menghindari error jika kosong datanya lalu jalankan method
        // tambahDataMahasiswa di mahasiswa_model 
        if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ){
            // jk berhasil , type success warna hijau 
            // error sebelumnya kurang ' di para berhasil Flasher::setFlash('berhasil, 'ditambahkan', 'success'); ada beda warna itu pertanda nya 
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;            
        }


    }


}