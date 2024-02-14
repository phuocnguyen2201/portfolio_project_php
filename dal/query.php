<?php 
  class query_command{
    public static $select_All_Students = "SELECT * FROM student";
    public static $select_All_Inquiry = "SELECT * FROM inquiry";
    public static $select_All_Skills = "SELECT * FROM skills";
    public static $select_All_Account = "SELECT * FROM account inner join user_info ON account.id = user_info.id;";

    public static function search_user($first_name, $skills, $operation){
      return "SELECT DISTINCT account.username FROM user_info INNER JOIN account ON account.id = user_info.id JOIN acc_skills on acc_skills.acc_id = account.id JOIN skills ON skills.id = acc_skills.skill_id WHERE user_info.first_name LIKE '%$first_name%' $operation skills.s_name IN ('$skills')";
    }
    public static function search_user_by_skill($skills){
      return "SELECT DISTINCT account.username FROM user_info INNER JOIN account ON account.id = user_info.id JOIN acc_skills on acc_skills.acc_id = account.id JOIN skills ON skills.id = acc_skills.skill_id WHERE skills.s_name IN ('$skills')";
    }

    public static function create_account($username, $password){
      return "INSERT INTO account (username, password) VALUES ('$username', '$password')";
    }
    public static function update_account_password($username, $password){
      return "UPDATE account SET password = '$password' WHERE username = '$username'";
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
      return "SELECT s_name FROM `skills` INNER JOIN acc_skills ON skills.id = acc_skills.skill_id INNER JOIN account ON account.id = acc_skills.acc_id WHERE account.username = '$username';";
    }
    public static function create_image_url($id, $image_name, $atl){
      return "INSERT INTO user_info (id, image_url, alt_text) VALUES ('$id', '$image_name', '$atl')";
    }
    public static function update_image_url($id, $image_name, $atl){
      return "UPDATE user_info SET image_url = '$image_name', alt_text = '$atl' where id = '$id'";
    }
    public static function update_user_info($id, $first_name, $last_name, $description, $title){
      return "UPDATE user_info SET first_name = '$first_name', last_name = '$last_name', description = '$description', title = '$title' WHERE id = '$id'";
    }
    public static function update_user_skill($account, $skills){
      return "INSERT INTO acc_skills (acc_id, skill_id) VALUES ('$account','$skills')";
    }
    public static function remove_user_skill($username){
      return "DELETE acc_skills FROM acc_skills inner join account on account.id = acc_skills.acc_id WHERE account.username='$username';";
    }
  }
?>