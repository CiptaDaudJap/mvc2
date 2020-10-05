
<?php
   // data ini bisa di ambil dari mana saja (database ) kali ini 
   // kita ambil dari database 
   class Mahasiswa_model {
       //kita buat nama tabel databasenya
       private $table = 'mahasiswa';
       private $db;
       // begitu kita panggil 
       public function __construct()
       {
            $this->db = new Database;
       }
       
    public function getAllMahasiswa()
    {   //kita load data basenya lalu di kembalikan hasilnya  
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {   // utk menyimpan dulu data yg akan kita binding tdk    
        // langsung masukan datanya dulu utk    
        // menghindari sql injection
        
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        // baru kita di masukan pakai function bind di database.php dimana ada 2 var , sdg type otomatis di isikan
        //id nya kita isi dgn $id  , kembalikan pakai single 
        // kalau all pakai resultset 
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    // data dari mahasiswa.php function tambah , insrt data nya di sini
    // isi nya sesuai dgn struct data basenya 
    public function tambahDataMahasiswa($data)
    {
       $query = "INSERT INTO mahasiswa
                    VALUES
                    ('', :nama, :nrp, :email, :jurusan)";
       $this->db->query($query);     
       // baru kita binding ke data base,pastikan semua sama dgn isi
       // name nya di masing masing input di index
       $this->db->bind('nama', $data['nama']);
       $this->db->bind('nrp', $data['nrp']);
       $this->db->bind('email', $data['email']);
       $this->db->bind('jurusan', $data['jurusan']);
       
       $this->db->execute();
       // jika berhasil maka ini menghasilkan angka 1 ada perubahan 
       return $this->db->rowCount();

    }

   }



