<?php
class Database
{
   private $host = "z3iruaadbwo0iyfp.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
   private $user = "r1q0c766m5mmekio";
   private $pass = "qa5i8appoqeul86j";
   private $dbname = "kaf6dc5g1n6g0lh6";
   private $con = null;

   function __construct()
   {
      $this->db_connect();
   }

   function db_connect()
   {
      try {
         if (is_null($this->con)) {
            $this->con = new PDO("mysql:host=" . $this->host . ";
                  dbname=" . $this->dbname, $this->user, $this->pass);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
         }
      } catch (PDOException $e) {
         echo "Lỗi: " . $e->getMessage();
      }
   }

   function db_disconnect()
   {
      if (!is_null($this->con))
         $this->con = null;
   }

   function __destruct()
   {
      $this->db_disconnect();
   }


   function db_execute($sql = '', $params = [])
   {
      if (!is_null($this->con)) {
         $result = $this->con->prepare($sql);
         $result->execute($params);
         if ($result->rowCount() > 0)
            return true;
      }
      return false;
   }

   function db_get_list($sql = '')
   {
      if (!is_null($this->con)) {
         $result = $this->con->prepare($sql);
         $result->execute();
         if ($result->rowCount() > 0) {
            while ($row = $result->fetch())
               $temp[] = $row;
            return $temp;
         }
      }
      return false;
   }


   function db_get_list_condition($sql = '', $params = [])
   {
      if (!is_null($this->con)) {
         $result = $this->con->prepare($sql);
         $result->execute($params);
         if ($result->rowCount() > 0) {
            while ($row = $result->fetch())
               $temp[] = $row;
            return $temp;
         }
      }
      return false;
   }

   function db_get_row($sql = '', $params = [])
   {
      if (!is_null($this->con)) {
         $result = $this->con->prepare($sql);
         $result->execute($params);
         if ($result->rowCount() > 0) {
            $row = $result->fetch();
            return $row;
         }
      }
      return false;
   }

   function db_num_rows($sql = '')
   {
      $count = 0;
      if (!is_null($this->con)) {
         $result = $this->con->prepare($sql);
         $result->execute();
         $count = $result->rowCount();
         return $count;
      }
      return false;
   }

   // Get Max ID with Auto_Increment
   function db_max_id($table)
   {
      if (!is_null($this->con)) {
         $count = 1;
         $sql = "select max(id) from $table";
         $result = $this->con->prepare($sql);
         $result->execute();
         if ($result->rowCount() > 0)
            $count = $result->fetch();
         return $count[0];
      }
      return false;
   }
}
