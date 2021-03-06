<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="Description" content="Roache Open">
<meta name="Keywords" content="roacheopen,roache,golf,tournament,philadelphia">
<meta name="Language" content="English">
<title>Roache Open</title>


<style type="text/css" title="layout" media="screen"> @import url("gg.css"); </style>

</head>

<body>
<div id="container">
	<div id="header"><div class="headerText">ROACHE OPEN 16</div>


<div class="center"><strong class="menu"><a href="index.htm">Home</a> | <a href="scorecard.htm">ScoreCard</a>
	<a href="directions.htm">Directions</a> | <a href="champs.htm">Champs</a> | <a href="rules.htm">Rules</a> |
	<a href="draft.htm">Draft</a> | <a href="ranks.php">Players</a> | <a href="contact.htm">Contact</a></strong></div>
</div>
           <div id="content">
                        <div id="bodytext">

		<h1 class="title">Player Rankings Confirmed: <br> </h1>
<br>
   <!-- Set up the table -->
  <table border='1'>
   <tr>
   </tr>
   <!-- Retrieve records from database -->
   <?php
   $db = pg_connect("host=localhost dbname=roacheopen user=postgres password=mibesfat");
   $query = "select *";
   $query .= " from roacheopen.golfers where status = 1 ";
   $query .= " order by currentrank;";
   $dbResult = pg_query($query);
   if (!$dbResult) {
     die("Database error...");
   }
   $num = pg_num_rows($dbResult);
   if ($num >= 0 && $num < 5)
     $teams = 1;
   if ($num >= 5 && $num < 9)
     $teams = 2;
   if ($num >= 9 && $num < 13)
     $teams = 3;
   if ($num >= 13 && $num < 17)
     $teams = 4;
   if ($num >= 17 && $num < 21)
     $teams = 5;
   if ($num >= 21 && $num < 25)
     $teams = 6;
   if ($num >= 25 && $num < 29)
     $teams = 7;
   if ($num >= 29 && $num < 33)
     $teams = 8;
   if ($num >= 33 && $num < 37)
     $teams = 9;
   if ($num >= 37 && $num < 41)
     $teams = 10;
   if ($num >= 41 && $num < 45)
     $teams = 11;
   if ($num >= 45 && $num < 49)
     $teams = 12;
   if ($num >= 49 && $num < 53)
     $teams = 13;
   if ($num >= 53 && $num < 57)
     $teams = 14;
   if ($num >= 57 && $num < 61)
     $teams = 15;
   if ($num >= 61 && $num < 65)
     $teams = 16;
   if ($num >= 65 && $num < 69)
     $teams = 17;
   if ($num >= 69 && $num < 73)
     $teams = 18;
   if ($num >= 73 && $num < 77)
     $teams = 19;
   if ($num >= 77 && $num < 81)
     $teams = 20;
   if ($num == 0) {
     echo '<tr><td colspan="4">';
     echo 'Database Query Retrieved Nothing!</td></tr>';
   }
   $i = 0;
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********************  Captains ************  </b>  </td>
                         </tr>\n";
   while ($i < $num) {
     $realname      = pg_Result ($dbResult, $i, 'realname');
     $curRank       = $i + 1;
     echo
"<tr>
                         <td> <b> $curRank         </b>  </td>
                         <td> <b> $realname        </b>  </td>

                         </tr>\n";
     if ($curRank == $teams) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********************  1st Rounders ************  </b>  </td>
                         </tr>\n";
     }
     if ($curRank == $teams * 2) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********************  2nd Rounders ************  </b>  </td>
                         </tr>\n";
     }
     if ($curRank == $teams * 3) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********************  3rd Rounders ************  </b>  </td>
                         </tr>\n";
     }
     $i++;
   }
   ?>

   <!-- Close out the table and end -->
   </table>
   <br><br><br>


   <!-- Set up the table -->
<b>Detailed Scouting report by Rank of Confirmed Players: <b><br><br>

   <table border="1">

   <tr>



   </tr>

   <!-- Retrieve records from database -->
   <?php

   $query = "select *";
   $query .= " from roacheopen.golfers where status = 1 ";
   $query .= " order by currentrank;";
   $dbResult = pg_query($query);

   if (!$dbResult) {
     die("Database error...");
   }

   $num = pg_num_rows($dbResult);
   if ($num == 0) {
     echo '<tr><td colspan="4">';
     echo 'Database Query Retrieved Nothing!</td></tr>';
   }
   $i = 0;

        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********  </b>  </td>
                         <td> <b> Captains </b>  </td>
                         <td> <b> ************  </b>  </td>
                         </tr>\n";

   while ($i < $num) {
     $realname      = pg_Result ($dbResult, $i, 'realname');
     $bio           = pg_Result ($dbResult, $i, 'bio');
     $currentrank   = pg_Result ($dbResult, $i, 'currentrank');
     $picture       = pg_Result ($dbResult, $i, 'picture');

     $curRank       = $i + 1;

     echo
"<tr>
                         <td> <b> $curRank      </b> </td>
                         <td>     $picture           </td>
                         <td> <b> $realname     </b> </td>
                         <td>     $bio               </td>


                         </tr>\n";



     if ($curRank == $teams) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********  </b>  </td>
                         <td> <b> 1st Rounders </b>  </td>
                         <td> <b> ************  </b>  </td>
                         </tr>\n";
     }
     if ($curRank == $teams * 2) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********  </b>  </td>
                         <td> <b> 2nd Rounders </b>  </td>
                         <td> <b> ************  </b>  </td>
                         </tr>\n";
     }
     if ($curRank == $teams * 3) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********  </b>  </td>
                         <td> <b> 3rd Rounders </b>  </td>
                         <td> <b> ************  </b>  </td>
                         </tr>\n";
     }

     $i++;
   }
   ?>

   <!-- Close out the table and end -->
   </table>


  <h1 class="title">Current Projected Teams: <br> </h1>
<br>
   <!-- Set up the table -->
  <table border='1'>
   <tr>
   </tr>
   <!-- Retrieve records from database -->
   <?php
   $query = "select *";
   $query .= " from roacheopen.golfers where status = 1 ";
   $query .= " order by currentrank;";
   $dbResult = pg_query($query);
   if (!$dbResult) {
     die("Database error...");
   }
   $num = pg_num_rows($dbResult);
   if ($num >= 0 && $num < 5)
     $teams = 1;
   if ($num >= 5 && $num < 9)
     $teams = 2;
   if ($num >= 9 && $num < 13)
     $teams = 3;
   if ($num >= 13 && $num < 17)
     $teams = 4;
   if ($num >= 17 && $num < 21)
     $teams = 5;
   if ($num >= 21 && $num < 25)
     $teams = 6;
   if ($num >= 25 && $num < 29)
     $teams = 7;
   if ($num >= 29 && $num < 33)
     $teams = 8;
   if ($num >= 33 && $num < 37)
     $teams = 9;
   if ($num >= 37 && $num < 41)
     $teams = 10;
   if ($num >= 41 && $num < 45)
     $teams = 11;
   if ($num >= 45 && $num < 49)
     $teams = 12;
   if ($num >= 49 && $num < 53)
     $teams = 13;
   if ($num >= 53 && $num < 57)
     $teams = 14;
   if ($num >= 57 && $num < 61)
     $teams = 15;
   if ($num >= 61 && $num < 65)
     $teams = 16;
   if ($num >= 65 && $num < 69)
     $teams = 17;
   if ($num >= 69 && $num < 73)
     $teams = 18;
   if ($num >= 73 && $num < 77)
     $teams = 19;
   if ($num >= 77 && $num < 81)
     $teams = 20;

  if ($num == 0) {
     echo '<tr><td colspan="4">';
     echo 'Database Query Retrieved Nothing!</td></tr>';
   }
   $i = 0;
for ($t = 1; $t < $teams + 1; $t++)
{
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> *************************************** TEAM $t ***********************************************</b>  </td>

                         </tr>\n";
     //temp for calc 1
        $c = $i;
     $realname      = pg_Result ($dbResult, $c, 'realname');
     $bio           = pg_Result ($dbResult, $c, 'bio');
     $currentrank   = pg_Result ($dbResult, $c, 'currentrank');
     $picture       = pg_Result ($dbResult, $c, 'picture');
     $curRank       = $c + 1;
     echo
"<tr>
                         <td> <b> $curRank      </b> </td>
                         <td> <b> $realname     </b> </td>
                         </tr>\n";

//temp for calc 2
        $c = $teams * 2;
        $c = $c - $i - 1;
     $realname      = pg_Result ($dbResult, $c, 'realname');
     $bio           = pg_Result ($dbResult, $c, 'bio');
     $currentrank   = pg_Result ($dbResult, $c, 'currentrank');
     $picture       = pg_Result ($dbResult, $c, 'picture');
     $curRank       = $c + 1;
     echo
"<tr>
                         <td> <b> $curRank      </b> </td>
                         <td> <b> $realname     </b> </td>

                         </tr>\n";


//temp for calc 3
        $c = $teams * 3;
        $c = $c - $i - 1;
     $realname      = pg_Result ($dbResult, $c, 'realname');
     $bio           = pg_Result ($dbResult, $c, 'bio');
     $currentrank   = pg_Result ($dbResult, $c, 'currentrank');
     $picture       = pg_Result ($dbResult, $c, 'picture');
     $curRank       = $c + 1;
     echo
"<tr>
                         <td> <b> $curRank      </b> </td>
                         <td> <b> $realname     </b> </td>

                         </tr>\n";


//temp for calc 4
        $c = $teams * 4;
        $c = $c - $i - 1;
     $realname      = pg_Result ($dbResult, $c, 'realname');
     $bio           = pg_Result ($dbResult, $c, 'bio');
     $currentrank   = pg_Result ($dbResult, $c, 'currentrank');
     $picture       = pg_Result ($dbResult, $c, 'picture');
     $curRank       = $c + 1;
     echo
"<tr>
                         <td> <b> $curRank      </b> </td>
                         <td> <b> $realname     </b> </td>

                         </tr>\n";


     $i++;
}
   ?>

   <!-- Close out the table and end -->
   </table>
   <br><br><br>


<br><br>




                <h1 class="title">Current Projected Teams with BIOS: <br> </h1>
<br>
   <!-- Set up the table -->
  <table border='1'>
   <tr>
   </tr>
   <!-- Retrieve records from database -->
   <?php
   $query = "select *";
   $query .= " from roacheopen.golfers where status = 1 ";
   $query .= " order by currentrank;";
   $dbResult = pg_query($query);
   if (!$dbResult) {
     die("Database error...");
   }
   $num = pg_num_rows($dbResult);
   if ($num >= 0 && $num < 5)
     $teams = 1;
   if ($num >= 5 && $num < 9)
     $teams = 2;
   if ($num >= 9 && $num < 13)
     $teams = 3;
   if ($num >= 13 && $num < 17)
     $teams = 4;
   if ($num >= 17 && $num < 21)
     $teams = 5;
   if ($num >= 21 && $num < 25)
     $teams = 6;
   if ($num >= 25 && $num < 29)
     $teams = 7;
   if ($num >= 29 && $num < 33)
     $teams = 8;
   if ($num >= 33 && $num < 37)
     $teams = 9;
   if ($num >= 37 && $num < 41)
     $teams = 10;
   if ($num >= 41 && $num < 45)
     $teams = 11;
   if ($num >= 45 && $num < 49)
     $teams = 12;
   if ($num >= 49 && $num < 53)
     $teams = 13;
   if ($num >= 53 && $num < 57)
     $teams = 14;
   if ($num >= 57 && $num < 61)
     $teams = 15;
   if ($num >= 61 && $num < 65)
     $teams = 16;
   if ($num >= 65 && $num < 69)
     $teams = 17;
   if ($num >= 69 && $num < 73)
     $teams = 18;
   if ($num >= 73 && $num < 77)
     $teams = 19;
   if ($num >= 77 && $num < 81)
     $teams = 20;
  if ($num == 0) {
     echo '<tr><td colspan="4">';
     echo 'Database Query Retrieved Nothing!</td></tr>';
   }
   $i = 0;
for ($t = 1; $t < $teams + 1; $t++)
{
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> *********  </b>  </td>
                         <td> <b> TEAM $t </b>  </td>
                         <td> <b> ***********************************  </b>  </td>

                         </tr>\n";
     //temp for calc 1
	$c = $i;
     $realname      = pg_Result ($dbResult, $c, 'realname');
     $bio           = pg_Result ($dbResult, $c, 'bio');
     $currentrank   = pg_Result ($dbResult, $c, 'currentrank');
     $picture       = pg_Result ($dbResult, $c, 'picture');
     $curRank       = $c + 1;
     echo
"<tr>
			 <td> <b> $curRank      </b> </td>
                         <td>     $picture           </td>
                         <td> <b> $realname     </b> </td>
                         <td>     $bio               </td>
                         </tr>\n";

//temp for calc 2
        $c = $teams * 2;
 	$c = $c - $i - 1;
     $realname      = pg_Result ($dbResult, $c, 'realname');
     $bio           = pg_Result ($dbResult, $c, 'bio');
     $currentrank   = pg_Result ($dbResult, $c, 'currentrank');
     $picture       = pg_Result ($dbResult, $c, 'picture');
     $curRank       = $c + 1;
     echo
"<tr>
			 <td> <b> $curRank      </b> </td>
                         <td>     $picture           </td>
                         <td> <b> $realname     </b> </td>
                         <td>     $bio               </td>

                         </tr>\n";


//temp for calc 3
        $c = $teams * 3;
 	$c = $c - $i - 1;
     $realname      = pg_Result ($dbResult, $c, 'realname');
     $bio           = pg_Result ($dbResult, $c, 'bio');
     $currentrank   = pg_Result ($dbResult, $c, 'currentrank');
     $picture       = pg_Result ($dbResult, $c, 'picture');
     $curRank       = $c + 1;
     echo
"<tr>
			 <td> <b> $curRank      </b> </td>
                         <td>     $picture           </td>
                         <td> <b> $realname     </b> </td>
                         <td>     $bio               </td>

                         </tr>\n";


//temp for calc 4
        $c = $teams * 4;
 	$c = $c - $i - 1;
     $realname      = pg_Result ($dbResult, $c, 'realname');
     $bio           = pg_Result ($dbResult, $c, 'bio');
     $currentrank   = pg_Result ($dbResult, $c, 'currentrank');
     $picture       = pg_Result ($dbResult, $c, 'picture');
     $curRank       = $c + 1;
     echo
"<tr>
			 <td> <b> $curRank      </b> </td>
                         <td>     $picture           </td>
                         <td> <b> $realname     </b> </td>
                         <td>     $bio               </td>

                         </tr>\n";


     $i++;
}
   ?>

   <!-- Close out the table and end -->
   </table>
   <br><br><br>


<br><br>





<br><br>
<br><br>
********************************************************
<br>
		<h1 class="title">Player Rankings UnConfirmed: <br> </h1>
   <!-- Set up the table -->


  <table border='1'>

   <tr>



   </tr>

   <!-- Retrieve records from database -->
   <?php

   $query = "select *";
   $query .= " from roacheopen.golfers where status = 2 ";
   $query .= " order by currentrank;";
   $dbResult = pg_query($query);

   if (!$dbResult) {
     die("Database error...");
   }

   $num = pg_num_rows($dbResult);

   if ($num >= 0 && $num < 5)
     $teams = 1;
   if ($num >= 5 && $num < 9)
     $teams = 2;
   if ($num >= 9 && $num < 13)
     $teams = 3;
   if ($num >= 13 && $num < 17)
     $teams = 4;
   if ($num >= 17 && $num < 21)
     $teams = 5;
   if ($num >= 21 && $num < 25)
     $teams = 6;
   if ($num >= 25 && $num < 29)
     $teams = 7;
   if ($num >= 29 && $num < 33)
     $teams = 8;
   if ($num >= 33 && $num < 37)
     $teams = 9;
   if ($num >= 37 && $num < 41)
     $teams = 10;
   if ($num >= 41 && $num < 45)
     $teams = 11;
   if ($num >= 45 && $num < 49)
     $teams = 12;
   if ($num >= 49 && $num < 53)
     $teams = 13;
   if ($num >= 53 && $num < 57)
     $teams = 14;
   if ($num >= 57 && $num < 61)
     $teams = 15;
   if ($num >= 61 && $num < 65)
     $teams = 16;
   if ($num >= 65 && $num < 69)
     $teams = 17;
   if ($num >= 69 && $num < 73)
     $teams = 18;
   if ($num >= 73 && $num < 77)
     $teams = 19;
   if ($num >= 77 && $num < 81)
     $teams = 20;
   if ($num >= 81 && $num < 85)
     $teams = 21;
   if ($num >= 85 && $num < 89)
     $teams = 22;
   if ($num >= 89 && $num < 93)
     $teams = 23;
   if ($num >= 93 && $num < 97)
     $teams = 24;
   if ($num >= 97 && $num < 101)
     $teams = 25;
   if ($num >= 101 && $num < 105)
     $teams = 26;






   if ($num == 0) {
     echo '<tr><td colspan="4">';
     echo 'Database Query Retrieved Nothing!</td></tr>';
   }
   $i = 0;
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********************  Captains ************  </b>  </td>
                         </tr>\n";

   while ($i < $num) {
     $realname      = pg_Result ($dbResult, $i, 'realname');
     $curRank       = $i + 1;
     echo
"<tr>
                         <td> <b> $curRank         </b>  </td>
                         <td> <b> $realname        </b>  </td>

                         </tr>\n";

     if ($curRank == $teams) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********************  1st Rounders ************  </b>  </td>
                         </tr>\n";
     }
     if ($curRank == $teams * 2) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********************  2nd Rounders ************  </b>  </td>
                         </tr>\n";
     }
     if ($curRank == $teams * 3) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********************  3rd Rounders ************  </b>  </td>
                         </tr>\n";
     }


     $i++;
   }
   ?>

   <!-- Close out the table and end -->
   </table>
   <br><br><br>



   <br><br><br>

		Detailed Player Ranks Unconfirmed:



<br>



   <!-- Set up the table -->

   <table border="1">

   <tr>



   </tr>

   <!-- Retrieve records from database -->
   <?php

   $query = "select *";
   $query .= " from roacheopen.golfers where status = 2 ";
   $query .= " order by currentrank;";
   $dbResult = pg_query($query);

   if (!$dbResult) {
     die("Database error...");
   }

   $num = pg_num_rows($dbResult);
   if ($num == 0) {
     echo '<tr><td colspan="4">';
     echo 'Database Query Retrieved Nothing!</td></tr>';
   }
   $i = 0;

        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********  </b>  </td>
                         <td> <b> Captains </b>  </td>
                         <td> <b> ************  </b>  </td>
                         </tr>\n";

   while ($i < $num) {
     $realname      = pg_Result ($dbResult, $i, 'realname');
     $bio           = pg_Result ($dbResult, $i, 'bio');
     $currentrank   = pg_Result ($dbResult, $i, 'currentrank');
     $picture       = pg_Result ($dbResult, $i, 'picture');

     $curRank       = $i + 1;

     echo
"<tr>
                         <td> <b> $curRank      </b> </td>
                         <td>     $picture           </td>
                         <td> <b> $realname     </b> </td>
                         <td>     $bio               </td>


                         </tr>\n";



     if ($curRank == $teams) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********  </b>  </td>
                         <td> <b> 1st Rounders </b>  </td>
                         <td> <b> ************  </b>  </td>
                         </tr>\n";
     }
     if ($curRank == $teams * 2) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********  </b>  </td>
                         <td> <b> 2nd Rounders </b>  </td>
                         <td> <b> ************  </b>  </td>
                         </tr>\n";
     }
     if ($curRank == $teams * 3) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********  </b>  </td>
                         <td> <b> 3rd Rounders </b>  </td>
                         <td> <b> ************  </b>  </td>
                         </tr>\n";
     }

     $i++;
   }
   ?>

   <!-- Close out the table and end -->
   </table>
   <br><br><br>



  <br><br><br>
*********************************************************
   <br><br><br>
Detailed Scouting Report for Unable to Attend:
   <!-- Set up the table -->

   <table border="1">

   <tr>



   </tr>

   <!-- Retrieve records from database -->
   <?php

   $query = "select *";
   $query .= " from roacheopen.golfers where status = 3 ";
   $query .= " order by currentrank;";
   $dbResult = pg_query($query);

   if (!$dbResult) {
     die("Database error...");
   }

   $num = pg_num_rows($dbResult);
   if ($num == 0) {
     echo '<tr><td colspan="4">';
     echo 'Database Query Retrieved Nothing!</td></tr>';
   }
   $i = 0;

        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********  </b>  </td>
                         <td> <b> Captains </b>  </td>
                         <td> <b> ************  </b>  </td>
                         </tr>\n";

   while ($i < $num) {
     $realname      = pg_Result ($dbResult, $i, 'realname');
     $bio           = pg_Result ($dbResult, $i, 'bio');
     $currentrank   = pg_Result ($dbResult, $i, 'currentrank');
     $picture       = pg_Result ($dbResult, $i, 'picture');

     $curRank       = $i + 1;

     echo
"<tr>
                         <td> <b> $curRank      </b> </td>
                         <td>     $picture           </td>
                         <td> <b> $realname     </b> </td>
                         <td>     $bio               </td>


                         </tr>\n";



     if ($curRank == $teams) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********  </b>  </td>
                         <td> <b> 1st Rounders </b>  </td>
                         <td> <b> ************  </b>  </td>
                         </tr>\n";
     }
     if ($curRank == $teams * 2) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********  </b>  </td>
                         <td> <b> 2nd Rounders </b>  </td>
                         <td> <b> ************  </b>  </td>
                         </tr>\n";
     }
     if ($curRank == $teams * 3) {
        echo
        "<tr>
                         <td> <b> ***     </b>  </td>
                         <td> <b> ********  </b>  </td>
                         <td> <b> 3rd Rounders </b>  </td>
                         <td> <b> ************  </b>  </td>
                         </tr>\n";
     }

     $i++;
   }
pg_close($db);
   ?>

   <!-- Close out the table and end -->
   </table>
   <br><br><br>




<br>
<br>
This is a very good video on the golf swing
<br>
<object width="400" height="336" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="videojugplayer"><param name="movie" value="http://www.videojug.com/film/player?id=34c8c669-3816-4341-7adf-2078497ac808"></param><param name="allowFullScreen" value="true"></param><param name="allowScriptAccess" value="always"></param><embed src="http://www.videojug.com/film/player?id=34c8c669-3816-4341-7adf-2078497ac808" type="application/x-shockwave-flash" width="400" height="336" allowFullScreen="true" allowScriptAccess="always"></embed></object><br /><a href="http://www.videojug.com/tag/golf-practice-drills">Practice Drills</a>: <a href="http://www.videojug.com/film/how-to-perform-the-perfect-golf-swing">How To Perform The Perfect Golf Swing</a>

<br>
<br>


		</h1>


</div>
</div>
</div>
</body>
</html>
