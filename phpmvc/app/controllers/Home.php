<?php 
  // class home anak dari class controller 
  class Home extends Controller {
      public function index()
      {
          // echo 'home/index';
         $data['judul'] = 'Home'; 
         // kita buat model utk ambil data user di kirim ke nama dan di tampilkan di index
         $data['nama'] = $this->model('user_model')->getUser();
         $this->view('templates/header', $data); 
         $this->view('home/index', $data); 
         $this->view('templates/footer');
      }
  }




?>