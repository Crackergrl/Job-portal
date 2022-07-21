<html>

<head>
    <title>Paging Using PHP</title>
</head>

<body>
<?php
$rec_limit = 10;

         /* Get total number of records */
         $sql = "SELECT * FROM all_jobs LEFT JOIN company ON all_jobs.customer_email=company.admin_email where keyword like '%$keyword%' OR category = '$category' or City='$city' limit $page1,3 ";
         $retval = mysqli_query( $conn, $sql );
         $row = mysqli_fetch_array($retval);
         $rec_count = $row[0];
         if( isset($_POST['search']) or ($_GET{'page'} ) ) {
             $page = $_GET{'page'} + 1;
             $offset = $rec_limit * $page ;
         }else {
             $page = 0;
             $offset = 0;
         }
         $left_rec = $rec_count - ($page * $rec_limit);
         $sql = "SELECT * FROM all_jobs LEFT JOIN company ON all_jobs.customer_email=company.admin_email where keyword like '%$keyword%' OR category = '$category' or City='$city'". "LIMIT $offset, $rec_limit";

         $retval = mysqli_query( $conn, $sql);
         while($row = mysqli_fetch_array($retval)) {
             if( $page > 0 ) {
                 $last = $page - 2;
                 echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a> |";
                 echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
             }
             else if( $page == 0 ) {
                 echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
             }
             else if( $left_rec < $rec_limit ) {
                 $last = $page - 2;
             }
             echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a>";
         }

      ?>

</body>
</html>