<?php
// ini database wrapper (membungkus database) dan bisa di gunakan
// utk tabel apa pun nantinya jadi bisa universal 
class DATABASE {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $db_name = DB_NAME;

        private $dbh;
        private $stmt;

        public function __construct()
        {
            // dsn= data source name  
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
            // option itu utk optimasi koneksi databasenya agar koneksinya tetap terjaga
            $option = [
                // ada error  ! ) Parse error: syntax error, unexpected '>' in E:\xampp\htdocs\phpmvc\app\core\database.php on line 19 jadi perhatikan error di > karena harus spasi true nya dan harus satu = . 
                // PDO::ATTR_PERSISTENT ==>true,
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            
            try {
                  $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
                  // jika tdk berhasil koneksi hentikan dan beri pesan
            } catch(PDOException $e) {
                die($e->getmessage());
            }
        }
       // kita buat query agar bisa di gunakan utk tambah,delete,update nanti 
        public function query($query)
        {
            $this->stmt = $this->dbh->prepare($query);
        }

        // kita buat func utk binding datanya , typenya kita buat null agar yg menentukan nanti applikasinya 
        // kita periksa type data ya di sini 

        public function bind($param, $value, $type = null)
        {
              if( is_null($type) ) {
                  // ada error
                  // Parse error: syntax error, unexpected 'case' (T_CASE) in E:\xampp\htdocs\phpmvc\app\core\database.php on line 45 , case nya tdk jalan ternyata salahnya di penulisan switch seharusnya 
                  // ini salahnya swtich( true ) { perhatikan juga warna nya  lain sendiri dari pasangannya yaitu case  
                  switch( true ) {    
                      case is_int($value) ;
                          $type = PDO::PARAM_INT;
                          break;
                      case is_bool($value) ;
                          $type = PDO::PARAM_BOOL;
                          break;
                      case is_null($value) :
                          $type = PDO::PARAM_NULL;
                          break;
                      default :
                           $type = PDO::PARAM_STR;    
                  }
              }
              // kita gabungankan di sini ini di lakukan
              // agar terhindar dari SQL injection , eksekusi 
              // di lakukan setelah string nya di bersihkan 
              $this->stmt->bindvalue($param, $value, $type);
        }
        // setelah di bind ( gabungkan ) datanya lalu kita 
        // eksekusi ke database
        public function execute()
        {
            $this->stmt->execute();
        }
        // jika datanya mau banyak pakai ini
        public function resultSet()
        {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        // jika datanya mau satu record saja pakai ini
        public function single()
        {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }

}
