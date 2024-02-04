<?php 
  class query_command{
    public static $select_All_Students = "SELECT * FROM student";
    public static $select_All_Inquiry = "SELECT * FROM inquiry";

    public static function query_account($username, $password){
      return "SELECT username, password, status FROM account where username = '$username' and password = '$password' and status = 0x01";
      //0x01 is active, 0x00 is inactive
    }
  }
?>