<!-- index php utk mahasiswa -->

<div class="container mt-5">

    <div class="row">
         <div class="col-6">
             <h3>Daftar Mahasiswa</h3>
            <!-- biasakan buka langsung buat tutupnya
            foreach langsung buat endforeach agar tdklupa --> 
            <!-- ul ini di ambildari bootstrap dari document component list group cari di sana 
            list group ini kita perlu satu li saja yg lain di hapus --> 
            <!-- kita cari juga badge di bootstarp pilih success copy class nya , utk agar taruh di kanan
            cari di list group -->
            <ul class="list-group">
               <?php foreach( $data['mhs'] as $mhs ) : ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                      <?= $mhs['nama']; ?>
                      <!-- pas  diklik detail ambil id nya --> 
                      <a href="<?= BASEURL; ?>/mahasisa/detail/<?= $mhs['id']; ?>" class="badge badge-primary">detail</a>
                  </li>
               <?php endforeach; ?>
            </ul>
         </div>
    </div>
</div> 


<!-- ini contoh nya <li class="list-group-item d-flex justify-content-between align-items-center">
    Cras justo odio
    <span class="badge badge-primary badge-pill">14</span>
  </li> -->