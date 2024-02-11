<?php 
  class query_command{
    public static $select_All_Students = "SELECT * FROM student";
    public static $select_All_Inquiry = "SELECT * FROM inquiry";
    public static $select_All_Skills = "SELECT * FROM skills";
    public static $select_All_Account = "SELECT * FROM account inner join user_info ON account.id = user_info.id;";

    public static function create_account($username, $password){
      return "INSERT INTO account (username, password) VALUES ('$username', '$password')";
    }

    public static function create_user_info($id, $first_name, $last_name, $description, $title){
      return "INSERT INTO user_info (id, first_name, last_name, description, title) VALUES ('$id', '$first_name', '$last_name', '$description', '$title')";
    }
    public static function query_account_id($username){
      return "SELECT username, id FROM account where username = '$username' limit 1";
    }
    public static function query_account($username, $password){
      return "SELECT username, password FROM account where username = '$username' and password = '$password'";
    }

    public static function query_user($username){
      return "SELECT * FROM account WHERE username = '$username'";
    }

    public static function query_user_info($username){
      return "SELECT *  FROM `account` inner join user_info ON account.id = user_info.id where username = '$username'";
    }
    public static function query_user_skill($username){
      return "SELECT s_name FROM `skills` INNER JOIN acc_skills on skills.id = acc_skills.skill_id INNER JOIN account ON account.id = acc_skills.acc_id WHERE account.username = '$username';";
    }
    public static function create_image_url($id, $image_name, $atl){
      return "INSERT INTO user_info (id, image_url, alt_text) VALUES ('$id', '$image_name', '$atl')";
    }
    public static function update_image_url($id, $image_name, $atl){
      return "UPDATE user_info SET image_url = '$image_name', alt_text = '$atl' where id = '$id'";
    }
    public static function update_user_info($username, $first_name, $last_name, $description, $title){
      return "UPDATE account SET first_name = '$first_name', last_name = '$last_name', description = '$description', title = '$title' WHERE username = '$username'";
    }
    public static function update_user_skill($account, $skills){
      return "insert into acc_skills (acc_id, skill_id) values ('$account','$skills')";
    }
    public static function remove_user_skill($username){
      return "DELETE acc_skills FROM acc_skills inner join account on account.id = acc_skills.acc_id WHERE account.username='$username';";
    }
  }
?>