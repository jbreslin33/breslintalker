<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Branch</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="775" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td> </td>
  </tr>
  <tr>
    <td>      <table width="700" border="0" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <td> </td>
        </tr>
        <tr>
          <td>
          <?
          $mode=$_GET["mode"];
          if($mode=="add") {
          ?>
          <form name="form1" method="post" action="formsubmit.php?mode=add">
            <table width="500" border="1" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td><strong>Add New Branch </strong></td>
                <td> </td>
              </tr>
              <tr>
                <td>Branch Name </td>
                <td><input name="branchname" type="text" id="branchname"></td>
              </tr>
              <tr>
                <td>Short Name</td>
                <td><input name="shortname" type="text" id="shortname"></td>
              </tr>
              <tr>
                <td><input type="submit" name="Submit" value="Save Data"></td>
                <td> </td>
              </tr>
            </table>
          </form>
          <?       
          } else  {
              include("conn.php");
            $sn=$_GET["sn"];
            $sql="select sn,branchname,shortname from $branch where sn='$sn'";
           
            $result=mysql_query($sql,$connection) or die(mysql_error());
            while($row=mysql_fetch_array($result)) {
                $sn=$row['sn'];
                $branchname=$row['branchname'];
                $shortname=$row['shortname'];
            }
        ?>
        <form name="form1" method="post" action="formsubmit.php?mode=update">
            <table width="500" border="1" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td><strong>Update Branch </strong></td>
                <td><input type="hidden" name="sn" value="<? echo $sn; ?>">
                   </td>
              </tr>
              <tr>
                <td>Branch  Name </td>
                <td><input name="branchname" type="text" id="branchname" value="<? echo $branchname; ?>"></td>
              </tr>
              <tr>
                <td>Short Name </td>
                <td><input name="shortname" type="text" id="shortname" value="<? echo $shortname; ?>"></td>
              </tr>
              <tr>
                <td><input type="submit" name="Submit" value="Update Data"></td>
                <td> </td>
              </tr>
            </table>
          </form>
       
        <?   
           
          }
          ?>
         
          </td>
        </tr>
        <tr>
          <td> </td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>