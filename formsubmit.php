<?php
          include("conn.php");
          $mode=$_GET["mode"];
          if($mode=="add") {
              $branchname=$_POST["branchname"];
            $shortname=$_POST["shortname"];
            $sql="insert into $branch(branchname,shortname) values('$branchname','$shortname')";
            $result=mysql_query($sql,$connection) or die(mysql_error());
            header("location: index.php");
           
          } elseif($mode=="update") {
              $branchname=$_POST["branchname"];
            $shortname=$_POST["shortname"];
            $sn=$_POST["sn"];
            $sql="update $branch set branchname='$branchname',shortname='$shortname' where sn='$sn'";
            //echo $sql;
            $result=mysql_query($sql,$connection) or die(mysql_error());
            header("location: index.php");
          }
          ?>
// Javascript File Script.js
function goDel()
{
    var recslen =  document.forms[0].length;
    var checkboxes=""
    for(i=1;i<recslen;i++)
    {
        if(document.forms[0].elements[i].checked==true)
        checkboxes+= " " + document.forms[0].elements[i].name
    }
   
    if(checkboxes.length>0)
    {
        var con=confirm("Are you sure you want to delete");
        if(con)
        {
            document.forms[0].action="delete.php?recsno="+checkboxes
            document.forms[0].submit()
        }
    }
    else
    {
        alert("No record is selected.")
    }
}

function selectall()
{
//        var formname=document.getElementById(formname);

        var recslen = document.forms[0].length;
       
        if(document.forms[0].topcheckbox.checked==true)
            {
                for(i=1;i<recslen;i++) {
                document.forms[0].elements[i].checked=true;
                }
    }
    else
    {
        for(i=1;i<recslen;i++)
        document.forms[0].elements[i].checked=false;
    }
}
?>