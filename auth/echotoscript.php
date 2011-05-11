

<?php
include 'config.php';
include 'opendb.php';

$usernamed = $_GET['usernamed'];

//$query = "SELECT * FROM account where username='$usernamed'";
$query = "Select * From account";
$result = mysql_query($query);
echo "BEGIN_RESULTS\r\n";
echo "$row\r\n";
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    echo "{$row['userid']} \r\n" .
         "{$row['username']} \r\n" .
         "{$row['password']} \r\n";
}
echo "END_RESULTS\r\n";
include 'closedb.php';
?>

