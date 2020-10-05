<!-- index php utk mahasiswa -->

<div class="container mt-3">
    <!-- kita tambahkan lg samakan di bawah juga kita panggil
    class flasher nya di sini ,karena static pakai :: -->
    <div class="row">
         <div class="col-lg-6">
              <?php Flasher::flash(); ?>
         </div>
    </div>

    <div class="row">
         <div class="col-lg-6">
             <!-- button ini bag dari live demo modal box bootstarp , kita ganti tulisan botton dan 
             data targetnya jadi formModal juga id nya di bawah ganti dgn forModal-->
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#forModal">
                 Tambah Data Mahasiswa
             </button>
             <br><br>

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
                      <!-- pas  diklik detail ambil id nya ,sebelumnya salah dlm penulisan
                      alamat nya mahasisa harusnya mahasiswa jadi tdk ketemu file detailnya  --> 
                      <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary">detail</a>
                  </li>
               <?php endforeach; ?>
            </ul>
         </div>
    </div>
</div> 


<!-- Modal ambil dari bootstarp modal , ganti id sesuai dgn 
data target di atas, id class modal-title -->
<div class="modal fade" id="forModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- isi dari tambah data ambil form di bootstarp, di form controlls , kita tambahkan name= "nama" dll di semua class form group detail nya , mthod kita ganti dgn post -->
      <div class="modal-body">
         <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="nrp">NRP</label>
                <input type="number" class="form-control" id="nrp" name="nrp">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan">
                <option value="Tehnik Informatika">Tehnik Informatika</option>
                <option value="Tehnik Mesin">Tehnik Mesin</option>
                <option value="Tehnik Industri">Tehnik Industri</option>
                <option value="Tehnik Pangan">Tehnik Pangan</option>
                <option value="Tehnik Planologi">Tehnik Planologi</option>
                <option value="Tehnik Linkungan">Tehnik Linkungan</option>
                </select>
            </div>
      </div>

      <!-- type button nya submit karena akan di kirim semua ke function detail di mahasiswa.php dgn menggunakan metode post-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
      </div>
    </div>
  </div>
</div>


<!-- ini contoh nya <li class="list-group-item d-flex justify-content-between align-items-center">
    Cras justo odio
    <span class="badge badge-primary badge-pill">14</span>
  </li> -->