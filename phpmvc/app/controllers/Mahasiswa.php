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

}