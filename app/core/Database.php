<?php

class Database
{
   private $host = DB_HOST;
   private $user = DB_USER;
   private $pass = DB_PASS;
   private $db_name = DB_NAME;

   private $dbh;
   private $stmt;

   public function __construct()
   {
      // data source name (lokasi data hosting, dan nama database)
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;


      // OPTION (MENJAGA DATABASE AGAR TER-OPTIMASI, DAN TERJAGA TERUS)
      $option = [
         PDO::ATTR_PERSISTENT => true,
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ];

      // TEST KONEKSI DATABASE
      try {
         $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
      } catch (PDOException $e) {
         die($e->getMessage());
      }
   }


   // DIGUNAKAN UNTUK BERBAGAI TABEL SECARA FLEKSIBEL 
   public function query($query)
   {
      $this->stmt = $this->dbh->prepare($query);
      // var_dump($query);
   }

   // UNTUK MENENTUKAN VALUE PARAMETER AGAR TERHINDAR DARI SQL INJECTION DAN MEMBERSIHKAN STRING
   public function bind($param, $value, $type = null)
   {
      if (is_null($type)) {
         switch (true) {
            // PARAMETER INTEGER
            case is_int($value):
               $type = PDO::PARAM_INT;
               break;

            // PARAMETER BOOLEAN
            case is_bool($value):
               $type = PDO::PARAM_BOOL;
               break;

            // PARAMETER NULL
            case is_null($value):
               $type = PDO::PARAM_NULL;
               break;

            default:
               $type = PDO::PARAM_STR;
         }
      }

      $this->stmt->bindValue($param, $value, $type);
   }

   // EKSEKUSI QUERY
   public function execute()
   {
      try {
         return $this->stmt->execute();
      } catch (PDOException $e) {
         echo 'PDO Error: ' . $e->getMessage(); // tampilkan error
         return false;
      }
   }

   // WRAPPER (PEMBUNGKUS DATABASE)
   // MENAMPILKAN HASIL (BANYAK)
   public function resultSet()
   {
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   // MENAMPILKAN HASIL (SATU)
   public function single()
   {
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_ASSOC);
   }

   // CLOSE DATABASE
   public function close()
   {
      $this->dbh = null;
   }

   public function rowCount()
   {
      return $this->stmt->rowCount();
   }
}
