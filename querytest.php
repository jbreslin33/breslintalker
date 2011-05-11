

<?php
include 'config.php';
include 'opendb.php';

$usernamed = $_GET['usernamed'];

//$query = "SELECT * FROM account where username = 'jbreslin'";
  $query = "SELECT * FROM account where username='$usernamed'";
$result = mysql_query($query);

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    echo "userid   : {$row['userid']} \r\n" .
         "username : {$row['username']} \r\n" .
         "password : {$row['password']} \r\n";
}

include 'closedb.php';
?>

