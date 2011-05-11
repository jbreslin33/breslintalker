

<?php
include 'config.php';
include 'opendb.php';

$query  = "SELECT * FROM account";
$result = mysql_query($query);

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    echo "userid :{$row['userid']} <br>" .
         "username : {$row['username']} <br>" .
         "password : {$row['password']} <br><br>";
}

include 'closedb.php';
?>

