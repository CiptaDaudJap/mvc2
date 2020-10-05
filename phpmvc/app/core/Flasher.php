<?php
// method static agar kita dpt memanngil nya tanpa perlu
// instansiasi pd class Flasher ini 
// ini utk menampilkan pesan spt do pesan
// kita gunakan bantuan bootstarp di doc cari alert

// agar class Flasher ini jalan masukan di file init.php utk di gabungkan  
// karena kita kerja dgn SESSION maka kita harus jalankan SESSION nya di file index.php di folder public 
class Flasher {
     public static function setFlash($pesan, $aksi, $tipe)
     {   // parameter nya ada 3 , isi pesan , aksi (tambah,update)
        // atau delete dan tipeatau warna pesan nya 
         $_SESSION['flash'] = [
               'pesan' => $pesan,
               'aksi'  => $aksi,
               'tipe'  => $tipe
         ];
     }
}

// kita cek dulu adakah action flash nya , ambil 
// dari bootstarp alert dismissing, kita concate ' . . ' 
     public static function flash()
     {    
         if( isset($_SESSION['flash']) ) {
             echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                       Data Mahasiswa <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>';
                   // setelah tampilpesan nya kita hapus 
                   unset($_SESSION['flash']);
         }
     }