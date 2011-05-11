mysql_select_db($auth_dbase);
$query = "select * from account where username='$user'";
$result = mysql_query($query,$home);
$row = mysql_fetch_assoc($result);
$temppass = $row['password'];
$userid = $row['userid'];
