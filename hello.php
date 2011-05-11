<?
//Call your variables file which should contain the $auth_host, etc variables
//These variables are your sql server variables
require_once("variables.php");

$host     = $GLOBALS['auth_host'];
$username = $GLOBALS['auth_user'];
$password = $GLOBALS['auth_pass'];
$database = $GLOBALS['auth_dbase'];

mysql_connect($host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="SELECT * FROM account";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

echo "Database_Output";

$i=0;
while ($i < $num) {

$uid=mysql_result($result,$i,"userid");
$un=mysql_result($result,$i,"username");
$pw=mysql_result($result,$i,"password");
echo "~";
echo "$uid";
echo "~";
echo "$un";
echo "";
echo "$pw";
echo "";
echo "~END_OF_ROW~";

$i++;
}

?>


 
