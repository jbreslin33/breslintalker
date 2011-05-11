<TABLE border=0>
<?
$query="SELECT * "
                ." FROM roache_open_players";

$db_conn = pg_connect ("", "", "", "", $dbname);
$qw = pg_exec ($db_conn, $query);
$row = 0;
while ($data2 = pg_fetch_object ($qw,$row)):
?>
<TR><FORM ACTION="tables.php" METHOD="post">
<INPUT TYPE="hidden" NAME="table" VALUE="<?echo $data2->tablename?>">
<TD width=125 align=Center>
<FONT COLOR=#FFFF33><B><?echo $data2->tablename?></B></FONT>
</TD>
</FORM></TR>
<?
$row++;
endwhile;
pg_freeResult ($qw);
pg_close ($db_conn);
?>
</TABLE>