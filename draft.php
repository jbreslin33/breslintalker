<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta name="Description" content="A free open source web design by Christina Chun.  Free for anyone to use as long as credits are intact. " />
<meta name="Keywords" content="www.oswd.org, open source web design, oswd.org, christina chun, christinachun.com, www.christinachun.com" />
<meta name="Copyright" content="Christina Chun" />
<meta name="Designed By" content="ChristinaChun.com" />
<meta name="Language" content="English" />
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<title>ROACHE OPEN</title>

<style type="text/css" title="layout" media="screen"> @import url("gg.css"); </style>

</head>

<body>
<div id="container">
	<div id="header"><div class="headerText">ROACHE OPEN 9</div>

<div class="center"><strong class="menu"><a href="index.htm">Home</a> | <a href="scorecard.htm">ScoreCard</a>
	<a href="directions.htm">Directions</a> | <a href="champs.htm">Champs</a> | <a href="rules.htm">Rules</a> |
	<a href="draft.php">Draft</a> | <a href="ranks.php">Players</a> | <a href="contact.htm">Contact</a></strong></div>
</div>

		<div id="content">
			<div id="bodytext">
		<h1 class="title">The Draft: <br> </h1>

		The drafters/captains will be ranked and described by Jim Roache, Rob Pietropaula, Jim Breslin and a 'Consensus'. If you wish
		to be a part of the 'consensus' email me changes
		or comments to jbreslin33@gmail.com. We would value greatly your serious or funny comments about yourself or others.<br> <br>


        The Draft Order will be as follows:<br>
        1st pick in 1st round goes to the worst ranked captain.
        Last pick in 1st round goes to the best ranked captain.<br><br>
        After the first round we will reseed for the 2nd round using the following method:<br>
        Add the ranks of the captain and their first round choice. Whichever team
        has the highest number will draft first, lowest number will draft last.
        <br><br>
        After the 2nd round we will reseed for the 3rd and final round using the following method:<br>
        Add the ranks of the captain and their 1st and 2nd round choice. Whichever team
        has the highest number will draft 1st, lowest number will draft last.

        <br><br><b>
        If your team only has 3 players you will not be given extra shots. <br>
        If you want to have a guarantee of having a 4th player than make sure you <br>
        take one of the lesser ranked 1st or 2nd round players that will give you a higher 3rd
        round pick. Obviously those who take a high ranked 1st rounder and a high ranked 2nd rounder
        have a chance of not having a 3rd round player but they can take solice in the fact that they have
        a high ranked 1st and 2nd rounder.</b><br><br>

<br><br>

   <!-- Set up the table -->


<b>Cheat Sheet: <b><br><br>


   <table border='1'>

   <tr>



   </tr>

   <!-- Retrieve records from database -->
   <?php
$db = pg_connect("host=localhost dbname=roacheopen user=postgres password=mibesfat")

    or die('Could not connect: ' . pg_last_error());
   $query = "select * from golfers;";
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


<br><br>

   <!-- Set up the table -->
<b>Detailed Sheet: <b><br><br>

   <table border="1">

   <tr>



   </tr>

   <!-- Retrieve records from database -->
   <?php

   $db = pg_connect("host=www.breslincomputerclub.com port=5432 dbname=roacheopen user=postgres password=mibesfat");
   $query = "select *";
   $query .= " from golfers where currentRank < 499 ";
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



---------------------------------------------------------------------------<br>
********************** Awaiting Reply **********************<Br>
---------------------------------------------------------------------------<br>
<b>Ted Malampy</b><BR>
<img src="images/caddyshack8.jpg" alt="Ted Malampy"
  align="left"><BR>
<b></b>
Hasn't played in a while, probably about high
90's to 100, with occasional long drives you can use. Has a range finder for distances and
isn't afraid to use it. Even though he hasn't played in a while i guarantee he finds a way to help the team
<BR clear="left">
---------------------------------------------------------------------------<br>
<b>Brian McCloskey</b><BR>
<img src="images/caddyshack8.jpg" alt="Brian McCloskey"
  align="left"><BR>
<b></b>
Hell of a baseball player got to think he is a above average player for this
tournament without even knowing a score from him.
<BR clear="left">
---------------------------------------------------------------------------<br>
<b>Gary Epis </b><BR>
<img src="images/caddyshack9.jpg" alt="Gary Epis"
  align="left"><BR>
<b>Former Winner (2007)</b>
Hit 15 foot putt in rain on 18th Hole to win 2007 Roache Open, Pressure Player)
<BR clear="left">
---------------------------------------------------------------------------<br>
<b>Joe Chic's Brother</b><BR>
<img src="images/caddyshack4.jpg" alt="John Breslin"
  align="left"><BR>
<b></b>
Need a scouting report from Joe Chic
<BR clear="left">
---------------------------------------------------------------------------<br>
************************ Out **********************<Br>
---------------------------------------------------------------------------<br>
<b>Bob </b><BR>
<img src="images/caddyshack6.jpg" alt="Bob."
  align="left"><BR>
<b>Defending Roache Open Champion. Former Winner (2008)</b>
Bob scared the bejesus out of the other teams during
his warmup shots before last years tournament so  we modified the rules for his threesome
to handicap them and they still won the Tournament. Moving him up to a drafter where we should have had him last year.
(Shoots anywhere from 77 to 95ish at Juniata(Par 65)
<BR clear="left">
---------------------------------------------------------------------------<br>
<b>Brian Roache</b><BR>
<img src="images/caddyshack10.jpg" alt="Brian Roache"
  align="left"><BR>
<b>Former Winner (2007)</b>
Uncanny ability to hit long puts and chips from fringe with
his Giant Gorilla Hands.) Just shot a 96 at Byrnes after not playing for 2 years.
<BR clear="left">
---------------------------------------------------------------------------<br>
<b>Kevin Kelly</b><BR>
<img src="images/caddyshack3.jpg" alt="Michelle"
  align="left"><BR>
<b></b>
Going to see Michael Bolton for 7th Time, Front Row
<BR clear="left">
---------------------------------------------------------------------------<br>
<b>Steve Maiale</b><BR>
<img src="images/stevemaiale.jpg" alt="Steve Maiale"
  align="left"><BR>
<b>Former Winner(2000)</b>
He could help you with seemingly random loud outburts at opposing players,
kind of like a golf goon.
<BR clear="left">
---------------------------------------------------------------------------<br>

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
	<div class="footer">
		<div>Designed By <a href="http://www.christinachun.com" title="Christina Chun - Digital Artist &amp; Web Developer">Christina Chun</a> &copy; 2006 | <a href="http://validator.w3.org/check?uri=referer">Valid XHTML</a></div>
	</div>
</body>
</html>
