<?
/*
GAME LOGIN

This script takes a login request from a server and returns
a true false message.

Get variable inputs:
	user
	passcrc

The table that is used in this script is as follows


CREATE TABLE account (
  userid mediumint(9) NOT NULL auto_increment,
  username varchar(16) NOT NULL default '',
  password varchar(16) NOT NULL default '',
  PRIMARY KEY  (userid),
  UNIQUE KEY userid (userid,username),
  KEY userid_2 (userid)
) TYPE=MyISAM COMMENT='Stores login details for Auth Server';



*/

//Call your variables file which should contain the $auth_host, etc variables
//These variables are your sql server variables
require_once("variables.php");

$auth_host = $GLOBALS['auth_host'];
$auth_user = $GLOBALS['auth_user'];
$auth_pass = $GLOBALS['auth_pass'];
$auth_dbase = $GLOBALS['auth_dbase'];


/*
echo "$$$$$$$$$$$$$$$$$$$$$$$$$ec <br>";
//Check username is valid else error and exit
if(is_null($user) || $user == "" || $user == " ")
{
	echo "Auth Server - Invalid Account Name <br>";
	exit();
}

//Check password is valid else error and exit
if(is_null($passcrc) || $passcrc == "" || $passcrc == " ")
{
	echo "Auth Server - Invalid Password<br>";
	exit();
}

*/

echo "about to run query......";
//Check password and username match
$home = mysql_connect($auth_host, $auth_user, $auth_pass);
mysql_select_db($auth_dbase);
$query = "select * from account where username='jbreslin'";
$result = mysql_query($query,$home);
$row = mysql_fetch_assoc($result);
$temppass = $row['password'];
$userid = $row['userid'];
//$crcpass = crc32($temppass);

echo $temppass;
/*
if($crcpass != $password)
{
	echo "Auth Server - Incorrect Password <br>";
	exit();
}


//Advise Server of verified data
echo "Auth Server - Verified Account Details<br>";
*/


?>
