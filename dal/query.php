<?php 
  class query_command{
    public static $select_All_Students = "SELECT * FROM student";
    public static $select_All_Inquiry = "SELECT * FROM inquiry";

    public static function query_account($username, $password){
      return "SELECT username, password FROM account where username = '$username' and password = '$password'";
    }
    public static function query_user_info($username){
      return "SELECT first_name, last_name, description, title  FROM `account` where username = '$username'";
    }
    public static function query_user_skill($username){
      return "SELECT skills.s_name FROM `skills` INNER JOIN acc_skills on skills.id = acc_skills.skill_id INNER JOIN account ON account.id = acc_skills.skill_id WHERE account.username = '$username';";
    }
  }
?>