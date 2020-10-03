
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
   }



