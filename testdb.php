   <html>
   <head>
   <title>Draft Board</title>
   </head>
   <body>
   <h2>Draft Board</h2>

   <!-- Set up the table -->
   <table>

   <tr>



   </tr>

   <!-- Retrieve records from database -->
   <?php

   $db = pg_connect("host=www.breslincomputerclub.com port=5432 dbname=roacheopen user=postgres password=mibesfat");
   $query = "select *";
   $query .= " from golfers";
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
   while ($i < $num) {
     $realname      = pg_Result ($dbResult, $i, 'realname');
     $bio           = pg_Result ($dbResult, $i, 'bio');
     $currentrank   = pg_Result ($dbResult, $i, 'currentrank');
     $picture       = pg_Result ($dbResult, $i, 'picture');
     $curRank       = $i + 1;
     echo
"<table border='1'><tr>
                         <td> <b> $curRank     </b>  </td>
                         <td>     $picture           </td>
                         <td> <b> $realname        </b>  </td>
                         <td>     $bio               </td>
                         <td> <b> $currentrank         </b> </td>

                         </tr>\n";
     $i++;
   }
   ?>

   <!-- Close out the table and end -->
   </table>
  </body>
  <html>
