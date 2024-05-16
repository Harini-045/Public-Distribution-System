<?php
  require 'includes/config.inc.php';
  $hashPwd = password_hash('root', PASSWORD_DEFAULT);
 /* $sql = "INSERT INTO employee (username, fullname,mob_no, pds_id, pwd, isadmin) VALUES ('', 'deepika', 'padukone', '8891735573', 2, '$hashPwd', 0)";*/
  $result = mysqli_query($conn, $sql);
  if(!$result){
    echo mysqli_error($conn);
  }
 ?>
